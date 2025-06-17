<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\CorporateAgentModel;

class CorporateAgentController extends BaseController
{
    protected $corporateAgentModel;

    public function __construct()
    {
        $this->corporateAgentModel = new CorporateAgentModel();
    }

    public function index()
    {
        $allCorporateAgent = $this->corporateAgentModel->findAll();

        return view('pages/admin/corporate_agent/index', [
            'allCorpoAgent' => $allCorporateAgent
        ]);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        return view('pages/admin/corporate_agent/tambah');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->corporateAgentModel->save($data);

        // Redirect with success message
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/corporate_agent'));
    }



    public function edit($id)
    {
        $corporateAgentData = $this->corporateAgentModel->find($id);

        if (!$corporateAgentData) {
            return redirect()->back()->with('error', 'Corporate Agent not found');
        }
        return view('pages/admin/corporate_agent/edit', ['corpoAgent' => $corporateAgentData]);
    }


    public function update($id)
    {
        $data = $this->request->getPost();

        // Validasi input
        $validationRules = [
            'heading_id' => 'required',
            'heading_en' => 'required',
            'title_id' => 'required',
            'title_en' => 'required',
            'section_id' => 'required',
            'section_en' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $this->corporateAgentModel->update($id, $data);

            return redirect()->to(base_url('admin/corporate_agent'))->with('success', 'Corporate Agent sukses di update');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal untuk mengupdate Corporate Agent: ' . $e->getMessage());
        }
    }


    public function delete($id)
    {
        if (!$id) {
            return redirect()->back();
        }

        $data = $this->corporateAgentModel->find($id);

        if (!$data) {
            session()->setFlashdata('error', 'Data tidak ditemukan.');
            return redirect()->back();
        }

        // Delete the FAQ from the database
        $this->corporateAgentModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/corporate_agent'));
    }
}
