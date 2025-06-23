<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\OtherFooterModel;
use CodeIgniter\HTTP\ResponseInterface;

class OtherFooter extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new OtherFooterModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Other Footer Management',
            'footers' => $this->model->findAll(),
        ];

        return view('pages/admin/other_footer/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Footer Content',
        ];

        return view('pages/admin/other_footer/create', $data);
    }

    public function store()
    {
        $rules = [
            'title_id' => 'required|max_length[64]',
            'title_en' => 'required|max_length[64]',
            'slug' => 'required|max_length[255]|is_unique[other_footer.slug]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'seo_tag_title_id' => $this->request->getPost('seo_tag_title_id'),
            'seo_tag_title_en' => $this->request->getPost('seo_tag_title_en'),
            'seo_description_id' => $this->request->getPost('seo_description_id'),
            'seo_description_en' => $this->request->getPost('seo_description_en'),
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'desc_id' => $this->request->getPost('desc_id'),
            'desc_en' => $this->request->getPost('desc_en'),
            'slug' => $this->request->getPost('slug'),
        ];

        if ($this->model->save($data)) {
            return redirect()->to('/admin/other_footer')->with('message', 'Footer content added successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Footer Content',
            'footer' => $this->model->find($id),
        ];

        return view('pages/admin/other_footer/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title_id' => 'required|max_length[64]',
            'title_en' => 'required|max_length[64]',
            'slug' => "required|max_length[255]|is_unique[other_footer.slug,id,$id]",
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'seo_tag_title_id' => $this->request->getPost('seo_tag_title_id'),
            'seo_tag_title_en' => $this->request->getPost('seo_tag_title_en'),
            'seo_description_id' => $this->request->getPost('seo_description_id'),
            'seo_description_en' => $this->request->getPost('seo_description_en'),
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'desc_id' => $this->request->getPost('desc_id'),
            'desc_en' => $this->request->getPost('desc_en'),
            'slug' => $this->request->getPost('slug'),
        ];

        if ($this->model->save($data)) {
            return redirect()->to('/admin/other_footer')->with('message', 'Footer content updated successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            return redirect()->to('/admin/other_footer')->with('message', 'Footer content deleted successfully');
        }

        return redirect()->to('/admin/other_footer')->with('errors', 'Failed to delete footer content');
    }

    public function detail($id)
    {
        $footer = $this->model->find($id);
        
        if (!$footer) {
            return redirect()->to('/other-footer')->with('errors', 'Footer content not found');
        }

        $data = [
            'title' => 'Footer Content Detail',
            'footer' => $footer
        ];

        return view('pages/admin/other_footer/detail', $data);
    }
}
