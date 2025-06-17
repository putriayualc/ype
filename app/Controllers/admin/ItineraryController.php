<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\DestinationModel;
use App\Models\ItineraryModel;

class ItineraryController extends BaseController
{
    protected $itineraryModel;

    public function __construct()
    {
        $this->itineraryModel = new ItineraryModel();
    }

    public function index()
    {
        $itinerary = $this->itineraryModel->findAll();
        return view('pages/admin/itinerary/index', [
            'itinerarys' => $itinerary
        ]);
    }

    public function create()
    {
        $destinationModel = new DestinationModel();
        $allDestination = $destinationModel->findAll();

        $validation = \Config\Services::validation();
        return view('pages/admin/itinerary/tambah', [
            'allDestination' => $allDestination,
            'validation' => $validation,
            'name_id' => '',
            'name_en' => '',
        ]);
    }

    public function store()
    {
        $data = $this->request->getPost();
        // dd($data);

        $this->itineraryModel->save($data);

        // Redirect with success message
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/itinerary'));
    }



    public function edit($id)
    {
        $destinationModel = new DestinationModel();
        $allDestination = $destinationModel->findAll();

        $itinerary = $this->itineraryModel->find($id);

        return view('pages/admin/itinerary/edit', [
            'allDestination' => $allDestination,
            'itinerary' => $itinerary
        ]);
    }


    public function update($id)
    {
        $data = $this->request->getPost();

        // Validasi input
        $validationRules = [
            'destination_slug' => 'required',
            'day' => 'required|numeric',
            'title_id' => 'required',
            'title_en' => 'required',
            'description_id' => 'required',
            'description_en' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        try {
            $this->itineraryModel->update($id, $data);
            return redirect()->to(base_url('admin/itinerary'))->with('success', 'Itinerary berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui itinerary: ' . $e->getMessage());
        }
    }


    public function delete($id)
    {
        $itineraryData = $this->itineraryModel->find($id);

        if (!$itineraryData) {
            session()->setFlashdata('error', 'Data tidak ditemukan.');
            return redirect()->back();
        }

        // Delete the FAQ from the database
        $this->itineraryModel->delete($id);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/itinerary'));
    }
}
