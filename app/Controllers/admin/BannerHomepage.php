<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\BannerHomepageModel;
use CodeIgniter\HTTP\ResponseInterface;

class BannerHomepage extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new BannerHomepageModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Banner Homepage Management',
            'banners' => $this->model->findAll(),
        ];

        return view('pages/admin/banner_homepage/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Banner',
        ];

        return view('pages/admin/banner_homepage/create', $data);
    }

    public function store()
    {
        $rules = [
            'title_id' => 'required|max_length[255]',
            'title_en' => 'required|max_length[255]',
            'slug' => 'required|max_length[255]|is_unique[banner_homepage.slug]',
            'url' => 'required|max_length[255]|valid_url',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'slug' => $this->request->getPost('slug'),
            'url' => $this->request->getPost('url'),
        ];

        if ($this->model->save($data)) {
            return redirect()->to('/admin/banner_homepage')->with('message', 'Banner added successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Banner',
            'banner' => $this->model->find($id),
        ];

        return view('pages/admin/banner_homepage/edit', $data);
    }

    public function update($id)
    {
        $banner = $this->model->find($id);
        $slugRule = $banner['slug'] == $this->request->getPost('slug') ? 
            'required|max_length[255]' : 
            'required|max_length[255]|is_unique[banner_homepage.slug]';

        $rules = [
            'title_id' => 'required|max_length[255]',
            'title_en' => 'required|max_length[255]',
            'slug' => $slugRule,
            'url' => 'required|max_length[255]|valid_url',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'slug' => $this->request->getPost('slug'),
            'url' => $this->request->getPost('url'),
        ];

        if ($this->model->save($data)) {
            return redirect()->to('/admin/banner_homepage')->with('message', 'Banner updated successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            return redirect()->to('/admin/banner_homepage')->with('message', 'Banner deleted successfully');
        }

        return redirect()->to('/admin/banner_homepage')->with('errors', 'Failed to delete banner');
    }
}