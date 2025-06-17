<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\DetailOtherServicesModel;

class DetailOtherServicesController extends BaseController
{
    protected $detailOtherServicesModel;

    public function __construct()
    {
        $this->detailOtherServicesModel = new DetailOtherServicesModel();
    }

    public function index()
    {
        $allDetOtherServices = $this->detailOtherServicesModel->findAll();

        return view('pages/admin/detail_other_services/index', [
            'allDetOtherServices' => $allDetOtherServices
        ]);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        return view('pages/admin/detail_other_services/tambah');
    }

    public function store()
    {
        $data['title_id'] = $this->request->getPost('title_id');
        $data['title_en'] = $this->request->getPost('title_en');
        $data['description_id'] = $this->request->getPost('description_en');
        $data['description_en'] = $this->request->getPost('description_en');

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Cek tipe file dan ukuran manual
            if (!in_array($image->getExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                return redirect()->back()->with('error', 'Format file image tidak didukung, harus jpg/jpeg/png/gif')->withInput();
            }
            if ($image->getSize() > 2048 * 1024) {
                return redirect()->back()->with('error', 'Ukuran file image maksimal 2MB')->withInput();
            }
            $nama_image = 'detail_other_services_' . $image->getRandomName();
            $image->move('assets/images/detail_other_services', $nama_image);
            $data['image'] = $nama_image;
        }

        $this->detailOtherServicesModel->save($data);

        // Redirect with success message
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/detail_other_services'));
    }



    public function edit($id)
    {
        $detOtherServices = $this->detailOtherServicesModel->find($id);

        if (!$detOtherServices) {
            return redirect()->back()->with('error', 'Detail Other Services not found');
        }
        return view('pages/admin/detail_other_services/edit', ['detail' => $detOtherServices]);
    }


    public function update($id)
    {
        // dd($this->request->getPost());
        // Ambil data existing dari database
        $existing = $this->detailOtherServicesModel->find($id);
        if (!$existing) {
            return redirect()->back()->with('error', 'Data tidak ditemukan')->withInput();
        }

        // Ambil data inputan
        $data['title_id'] = $this->request->getPost('title_id');
        $data['title_en'] = $this->request->getPost('title_en');
        $data['description_id'] = $this->request->getPost('description_id');
        $data['description_en'] = $this->request->getPost('description_en');

        // Proses gambar baru jika ada
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Validasi file
            if (!in_array($image->getExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                return redirect()->back()->with('error', 'Format file image tidak didukung, harus jpg/jpeg/png/gif')->withInput();
            }
            if ($image->getSize() > 2048 * 1024) {
                return redirect()->back()->with('error', 'Ukuran file image maksimal 2MB')->withInput();
            }

            // Generate nama dan simpan
            $nama_image = 'detail_other_services_' . $image->getRandomName();
            $image->move('assets/images/detail_other_services', $nama_image);
            $data['image'] = $nama_image;

            // Hapus gambar lama jika ada
            if (!empty($existing['image']) && file_exists('assets/images/detail_other_services/' . $existing['image'])) {
                unlink('assets/images/detail_other_services/' . $existing['image']);
            }
        }

        // Simpan perubahan
        $this->detailOtherServicesModel->update($id, $data);

        // Redirect dengan pesan sukses
        session()->setFlashdata('success', 'Data berhasil diperbarui');
        return redirect()->to(base_url('admin/detail_other_services'));
    }


    public function delete($id)
    {
        // Ambil data dari database
        $detail = $this->detailOtherServicesModel->find($id);
        if (!$detail) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Hapus gambar jika ada
        if (!empty($detail['image'])) {
            $imagePath = 'assets/images/detail_other_services/' . $detail['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Hapus data dari database
        $this->detailOtherServicesModel->delete($id);

        // Redirect dengan pesan
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/detail_other_services'));
    }
}
