<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\ThreePillarsModel;
use CodeIgniter\HTTP\ResponseInterface;

class ThreePillars extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ThreePillarsModel();
        helper(['form', 'text']);
    }

    public function index()
    {
        $data = [
            'title' => 'Three Pillars Management',
            'pillars' => $this->model->findAll(),
        ];

        return view('pages/admin/three_pillars/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Pillar',
        ];

        return view('pages/admin/three_pillars/create', $data);
    }

    public function store()
    {
        $rules = [
            'title_id' => 'required|max_length[64]',
            'title_en' => 'required|max_length[64]',
            'slug' => 'required|max_length[255]|is_unique[three_pillars.slug]',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle image upload
        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move('assets/images/three_pillars', $imageName);

        $data = [
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'description_id' => $this->request->getPost('description_id'),
            'description_en' => $this->request->getPost('description_en'),
            'slug' => $this->request->getPost('slug'),
            'image' => $imageName,
        ];

        if ($this->model->save($data)) {
            return redirect()->to('/admin/three_pillars')->with('message', 'Pillar added successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pillar',
            'pillar' => $this->model->find($id),
        ];

        return view('pages/admin/three_pillars/edit', $data);
    }

    public function update($id)
    {
        $pillar = $this->model->find($id);
        $slugRule = $pillar['slug'] == $this->request->getPost('slug') ?
            'required|max_length[255]' :
            'required|max_length[255]|is_unique[three_pillars.slug]';

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
                $image->move('assets/images/three_pillars', $imageName);

                // Delete old image
                if ($pillar['image'] && file_exists('assets/images/three_pillars/' . $pillar['image'])) {
                    unlink('assets/images/three_pillars/' . $pillar['image']);
                }

                $data['image'] = $imageName;
            }
        }

        if ($this->model->save($data)) {
            return redirect()->to('/admin/three_pillars')->with('message', 'Pillar updated successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function delete($id)
    {
        $pillar = $this->model->find($id);

        // Delete image file
        if ($pillar['image'] && file_exists('assets/images/three_pillars/' . $pillar['image'])) {
            unlink('assets/images/three_pillars/' . $pillar['image']);
        }

        if ($this->model->delete($id)) {
            return redirect()->to('/admin/three_pillars')->with('message', 'Pillar deleted successfully');
        }

        return redirect()->to('/admin/three_pillars')->with('errors', 'Failed to delete pillar');
    }

    public function detail($id)
    {
        $pillar = $this->model->find($id);

        if (!$pillar) {
            return redirect()->to('/admin/three_pillars')->with('errors', 'Pillar not found');
        }

        $data = [
            'title' => 'Pillar Details',
            'pillar' => $pillar
        ];

        return view('pages/admin/three_pillars/detail', $data);
    }
}
