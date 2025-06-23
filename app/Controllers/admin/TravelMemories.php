<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\TravelMemoriesModel;
use App\Models\DestinationModel;
use CodeIgniter\HTTP\ResponseInterface;

class TravelMemories extends BaseController
{
    protected $model;
    protected $destinationModel;

    public function __construct()
    {
        $this->model = new TravelMemoriesModel();
        $this->destinationModel = new DestinationModel();
        helper(['form', 'text']);
    }

    public function index()
    {
        $data = [
            'title' => 'Travel Memories Management',
            'memories' => $this->model->getMemoriesWithDestination(),
        ];

        return view('pages/admin/travel_memories/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Travel Memory',
            'destinations' => $this->destinationModel->findAll(),
        ];

        return view('pages/admin/travel_memories/create', $data);
    }

    public function store()
    {
        $rules = [
            'heading_id' => 'required|max_length[255]',
            'heading_en' => 'required|max_length[255]',
            'destination_id' => 'required|numeric',
            'title_id' => 'required|max_length[255]',
            'title_en' => 'required|max_length[255]',
            'slug' => 'required|max_length[255]|is_unique[travel_memories.slug]',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle image upload
        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move('assets/images/travel_memories', $imageName);

        $data = [
            'heading_id' => $this->request->getPost('heading_id'),
            'heading_en' => $this->request->getPost('heading_en'),
            'section_id' => $this->request->getPost('section_id'),
            'section_en' => $this->request->getPost('section_en'),
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'destination_id' => $this->request->getPost('destination_id'),
            'image' => $imageName,
            'slug' => $this->request->getPost('slug'),
        ];

        if ($this->model->save($data)) {
            return redirect()->to('/admin/travel_memories')->with('message', 'Travel memory added successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Travel Memory',
            'memory' => $this->model->find($id),
            'destinations' => $this->destinationModel->findAll(),
        ];

        return view('pages/admin/travel_memories/edit', $data);
    }

    public function update($id)
    {
        $memory = $this->model->find($id);
        $slugRule = $memory['slug'] == $this->request->getPost('slug') ? 
            'required|max_length[255]' : 
            'required|max_length[255]|is_unique[travel_memories.slug]';

        $rules = [
            'heading_id' => 'required|max_length[255]',
            'heading_en' => 'required|max_length[255]',
            'destination_id' => 'required|numeric',
            'title_id' => 'required|max_length[255]',
            'title_en' => 'required|max_length[255]',
            'slug' => $slugRule,
            'image' => 'max_size[image,2048]|is_image[image]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'heading_id' => $this->request->getPost('heading_id'),
            'heading_en' => $this->request->getPost('heading_en'),
            'section_id' => $this->request->getPost('section_id'),
            'section_en' => $this->request->getPost('section_en'),
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'destination_id' => $this->request->getPost('destination_id'),
            'slug' => $this->request->getPost('slug'),
        ];

        // Handle image upload if new image is provided
        if ($image = $this->request->getFile('image')) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move('assets/images/travel_memories', $imageName);
                
                // Delete old image
                if ($memory['image'] && file_exists('assets/images/travel_memories/' . $memory['image'])) {
                    unlink('assets/images/travel_memories/' . $memory['image']);
                }
                
                $data['image'] = $imageName;
            }
        }

        if ($this->model->save($data)) {
            return redirect()->to('/admin/travel_memories')->with('message', 'Travel memory updated successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function delete($id)
    {
        $memory = $this->model->find($id);
        
        // Delete image file
        if ($memory['image'] && file_exists('assets/images/travel_memories/' . $memory['image'])) {
            unlink('assets/images/travel_memories/' . $memory['image']);
        }

        if ($this->model->delete($id)) {
            return redirect()->to('/admin/travel_memories')->with('message', 'Travel memory deleted successfully');
        }

        return redirect()->to('/admin/travel_memories')->with('errors', 'Failed to delete travel memory');
    }
}