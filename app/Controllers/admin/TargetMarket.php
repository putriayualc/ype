<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\TargetMarketModel;
use CodeIgniter\HTTP\ResponseInterface;

class TargetMarket extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TargetMarketModel();
        helper(['form', 'text']);
    }

    public function index()
    {
        $data = [
            'title' => 'Target Market Management',
            'markets' => $this->model->findAll(),
        ];

        return view('pages/admin/target_market/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Target Market',
        ];

        return view('pages/admin/target_market/create', $data);
    }

    public function store()
    {
        $rules = [
            'title_id' => 'required|max_length[64]',
            'title_en' => 'required|max_length[64]',
            'slug' => 'required|max_length[64]|is_unique[target_market.slug]',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle image upload
        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move('assets/images/target_market', $imageName);

        $data = [
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'description_id' => $this->request->getPost('description_id'),
            'description_en' => $this->request->getPost('description_en'),
            'slug' => $this->request->getPost('slug'),
            'image' => $imageName,
        ];

        if ($this->model->save($data)) {
            return redirect()->to('/admin/target_market')->with('message', 'Target market added successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Target Market',
            'market' => $this->model->find($id),
        ];

        return view('pages/admin/target_market/edit', $data);
    }

    public function update($id)
    {
        $market = $this->model->find($id);
        $slugRule = $market['slug'] == $this->request->getPost('slug') ? 
            'required|max_length[64]' : 
            'required|max_length[64]|is_unique[target_market.slug]';

        $rules = [
            'title_id' => 'required|max_length[64]',
            'title_en' => 'required|max_length[64]',
            'slug' => $slugRule,
            'image' => 'max_size[image,2048]|is_image[image]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'description_id' => $this->request->getPost('description_id'),
            'description_en' => $this->request->getPost('description_en'),
            'slug' => $this->request->getPost('slug'),
        ];

        // Handle image upload if new image is provided
        if ($image = $this->request->getFile('image')) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move('assets/images/target_market', $imageName);
                
                // Delete old image
                if ($market['image'] && file_exists('assets/images/target_market/' . $market['image'])) {
                    unlink('assets/images/target_market/' . $market['image']);
                }
                
                $data['image'] = $imageName;
            }
        }

        if ($this->model->save($data)) {
            return redirect()->to('/admin/target_market')->with('message', 'Target market updated successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function delete($id)
    {
        $market = $this->model->find($id);
        
        // Delete image file
        if ($market['image'] && file_exists('assets/images/target_market/' . $market['image'])) {
            unlink('assets/images/target_market/' . $market['image']);
        }

        if ($this->model->delete($id)) {
            return redirect()->to('/admin/target_market')->with('message', 'Target market deleted successfully');
        }

        return redirect()->to('/admin/target_market')->with('errors', 'Failed to delete target market');
    }
}