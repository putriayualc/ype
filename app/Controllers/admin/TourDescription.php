<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\TourDescriptionModel;
use App\Models\DestinationModel;
use CodeIgniter\HTTP\ResponseInterface;

class TourDescription extends BaseController
{
    protected $model;
    protected $destinationModel;

    public function __construct()
    {
        $this->model = new TourDescriptionModel();
        $this->destinationModel = new DestinationModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Tour Descriptions Management',
            'descriptions' => $this->model->getDescriptionsWithDestination(),
        ];

        return view('pages/admin/tour_description/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Tour Description',
            'destinations' => $this->destinationModel->findAll(),
        ];

        return view('pages/admin/tour_description/create', $data);
    }

    public function store()
    {
        $rules = [
            'destination_id' => 'required|numeric',
            'title_id' => 'required|max_length[255]',
            'title_en' => 'required|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'destination_id' => $this->request->getPost('destination_id'),
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'sub_title_id' => $this->request->getPost('sub_title_id'),
            'sub_title_en' => $this->request->getPost('sub_title_en'),
        ];

        if ($this->model->save($data)) {
            return redirect()->to('/admin/tour_description')->with('message', 'Tour description added successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Tour Description',
            'description' => $this->model->find($id),
            'destinations' => $this->destinationModel->findAll(),
        ];

        return view('pages/admin/tour_description/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'destination_id' => 'required|numeric',
            'title_id' => 'required|max_length[255]',
            'title_en' => 'required|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'destination_id' => $this->request->getPost('destination_id'),
            'title_id' => $this->request->getPost('title_id'),
            'title_en' => $this->request->getPost('title_en'),
            'sub_title_id' => $this->request->getPost('sub_title_id'),
            'sub_title_en' => $this->request->getPost('sub_title_en'),
        ];

        if ($this->model->save($data)) {
            return redirect()->to('/admin/tour_description')->with('message', 'Tour description updated successfully');
        }

        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            return redirect()->to('/admin/tour_description')->with('message', 'Tour description deleted successfully');
        }

        return redirect()->to('/admin/tour_description')->with('errors', 'Failed to delete tour description');
    }
}