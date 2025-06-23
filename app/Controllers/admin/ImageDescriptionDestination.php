<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\ImageDescriptionDestinationModel;
use App\Models\DestinationModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ImageDescriptionDestination extends BaseController
{
    protected $model;
    protected $destinationModel;

    public function __construct()
    {
        $this->model = new ImageDescriptionDestinationModel();
        $this->destinationModel = new DestinationModel();
        helper(['form', 'text']);
    }

    public function index()
    {
        $data = [
            'title' => 'Image Description Destinations',
            'images' => $this->model->getImagesWithDestination()
        ];

        return view('pages/admin/image_description_destination/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Image Description',
            'destinations' => $this->destinationModel->findAll()
        ];

        return view('pages/admin/image_description_destination/create', $data);
    }

    public function store()
    {
        $rules = [
            'destination_id' => 'required|numeric',
            'title_id' => 'required|max_length[255]',
            'title_en' => 'required|max_length[255]',
            'slug' => 'required|max_length[255]|is_unique[image_description_destination.slug]',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]',
            'alt_image' => 'max_length[255]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/assets/images/destinations', $newName);

            $data = [
                'destination_id' => $this->request->getPost('destination_id'),
                'title_id' => $this->request->getPost('title_id'),
                'title_en' => $this->request->getPost('title_en'),
                'slug' => $this->request->getPost('slug'),
                'alt_image' => $this->request->getPost('alt_image') ?? '',
                'url' => $newName
            ];

            $this->model->insert($data);
            return redirect()->to('/admin/image_description_destination')->with('message', 'Image added successfully');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to upload image');
    }

    public function edit($id)
    {
        $image = $this->model->find($id);

        if (!$image) {
            throw new PageNotFoundException('Image not found');
        }

        $data = [
            'title' => 'Edit Image Description',
            'image' => $image,
            'destinations' => $this->destinationModel->findAll()
        ];

        return view('pages/admin/image_description_destination/edit', $data);
    }

    public function update($id)
    {
        $image = $this->model->find($id);

        if (!$image) {
            throw new PageNotFoundException('Image not found');
        }

        $rules = [
            'destination_id' => 'required|numeric',
            'title_id' => 'required|max_length[255]',
            'title_en' => 'required|max_length[255]',
            'slug' => "required|max_length[255]|is_unique[image_description_destination.slug,id,{$id}]",
            'image' => 'max_size[image,2048]|is_image[image]',
            'alt_image' => 'max_length[255]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'destination_id' => $this->request->getPost('destination_id'),
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'slug' => $this->request->getPost('slug'),
            'alt_image' => $this->request->getPost('alt_image') ?? ''
        ];

        // Handle file upload if a new image is provided
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old image
            if ($image['url'] && file_exists(ROOTPATH . 'public/assets/images/destinations/' . $image['url'])) {
                unlink(ROOTPATH . 'public/assets/images/destinations/' . $image['url']);
            }
            
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/assets/images/destinations', $newName);
            $data['url'] = $newName;
        }

        $this->model->update($id, $data);

        return redirect()->to('/admin/image_description_destination')->with('message', 'Image updated successfully');
    }

    public function delete($id)
    {
        $image = $this->model->find($id);

        if (!$image) {
            throw new PageNotFoundException('Image not found');
        }

        // Delete the image file
        if ($image['url'] && file_exists(ROOTPATH . 'public/assets/images/destinations/' . $image['url'])) {
            unlink(ROOTPATH . 'public/assets/images/destinations/' . $image['url']);
        }

        $this->model->delete($id);

        return redirect()->to('/admin/image_description_destination')->with('message', 'Image deleted successfully');
    }
}