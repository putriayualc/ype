<?php

namespace App\Controllers\admin;

use App\Models\ImageDestinationModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\admin\BaseController;

class ImageDestination extends BaseController
{
    protected $imageDestinationModel;
    protected $destinationModel;

    public function __construct()
    {
        $this->imageDestinationModel = new ImageDestinationModel();
        $this->destinationModel = new \App\Models\DestinationModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Image Destinations',
            'images' => $this->imageDestinationModel->getDescriptionsWithDestination()
        ];

        return view('pages/admin/image_destination/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Image Destination',
            'destinations' => $this->destinationModel->findAll()
        ];

        return view('pages/admin/image_destination/create', $data);
    }

    public function store()
    {
        $rules = [
            'destination_id' => 'required|numeric',
            'image_name_id' => 'required|max_length[255]',
            'image_name_en' => 'required|max_length[255]',
            'slug' => 'required|max_length[255]|is_unique[image_destination.slug]',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]',
            'alt_image' => 'max_length[255]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('image');
        $newName = $file->getRandomName();

        if (!$file->move(ROOTPATH . 'public/assets/images/destinations/', $newName)) {
            return redirect()->back()->withInput()->with('errors', ['image' => 'Gagal memindahkan file gambar.']);
        }

        $data = [
            'destination_id' => $this->request->getPost('destination_id'),
            'image_name_id' => $this->request->getPost('image_name_id'),
            'image_name_en' => $this->request->getPost('image_name_en'),
            'slug' => $this->request->getPost('slug'),
            'image' => $newName,
            'alt_image' => $this->request->getPost('alt_image') ?? ''
        ];

        $this->imageDestinationModel->insert($data);

        return redirect()->to('/admin/image_destination')->with('message', 'Image destination added successfully');
    }

    public function edit($id)
    {
        $image = $this->imageDestinationModel->find($id);

        if (!$image) {
            throw new PageNotFoundException('Image destination not found');
        }

        $data = [
            'title' => 'Edit Image Destination',
            'image' => $image,
            'destinations' => $this->destinationModel->findAll()
        ];

        return view('pages/admin/image_destination/edit', $data);
    }

    public function update($id)
    {
        $image = $this->imageDestinationModel->find($id);

        if (!$image) {
            throw new PageNotFoundException('Image destination not found');
        }

        $rules = [
            'destination_id' => 'required|numeric',
            'image_name_id' => 'required|max_length[255]',
            'image_name_en' => 'required|max_length[255]',
            'slug' => "required|max_length[255]|is_unique[image_destination.slug,id,{$id}]",
            'image' => 'max_size[image,2048]|is_image[image]',
            'alt_image' => 'max_length[255]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'destination_id' => $this->request->getPost('destination_id'),
            'image_name_id' => $this->request->getPost('image_name_id'),
            'image_name_en' => $this->request->getPost('image_name_en'),
            'slug' => $this->request->getPost('slug'),
            'alt_image' => $this->request->getPost('alt_image') ?? ''
        ];

        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($image['image'] && file_exists(ROOTPATH . 'public/assets/images/destinations/' . $image['image'])) {
                unlink(ROOTPATH . 'public/assets/images/destinations/' . $image['image']);
            }

            $newName = $file->getRandomName();
            if (!$file->move(ROOTPATH . 'public/assets/images/destinations/', $newName)) {
                return redirect()->back()->withInput()->with('errors', ['image' => 'Gagal mengganti file gambar.']);
            }

            $data['image'] = $newName;
        }

        $this->imageDestinationModel->update($id, $data);

        return redirect()->to('/admin/image_destination')->with('message', 'Image destination updated successfully');
    }

    public function destroy($id)
    {
        $image = $this->imageDestinationModel->find($id);

        if (!$image) {
            throw new PageNotFoundException('Image destination not found');
        }

        if ($image['image'] && file_exists(ROOTPATH . 'public/assets/images/destinations/' . $image['image'])) {
            unlink(ROOTPATH . 'public/assets/images/destinations/' . $image['image']);
        }

        $this->imageDestinationModel->delete($id);

        return redirect()->to('/admin/image_destination')->with('message', 'Image destination deleted successfully');
    }
}
