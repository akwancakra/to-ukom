<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PinjamBarangModel;

class PinjamBarang extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new PinjamBarangModel();
    }

    public function index()
    {
        // $pinjam = $this->model->findAll();
        
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $pinjam = $this->model->search($keyword);
            // dd($pinjam);
        }else{
            $pinjam = $this->model;
        }

        $data = [
            'title' => 'Daftar Pinjam Barang | Inventaris',
            'datas' => $pinjam->paginate(10, 'pinjam'),
            'pager' => $this->model->pager
            // 'datas' => $pinjam,
        ];

        return view('pinjam/daftar', $data);
    }

    public function insert()
    {
        $data = [
            'peminjam' => $this->request->getVar('peminjam'),
            'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
            'barang_pinjam' => $this->request->getVar('barang_pinjam'),
            'jml_pinjam' => $this->request->getVar('jml_pinjam'),
        ];

        $save = $this->model->save($data);

        if ($save) {
            session()->setFlashdata('success', 'Data Successfully Added!');
            return redirect()->to(base_url('/pinjam'));
        }else{
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }

    public function edit($id_pinjam)
    {
        $pinjam = $this->model->find($id_pinjam);
        
        $data = [ 
            'title' => 'Edit Data Pinjaman | Inventaris',
            'datas' => $pinjam
        ];

        return view('pinjam/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'peminjam' => 'required',
            'tgl_pinjam' => 'required',
            'barang_pinjam' => 'required',
            'jml_pinjam' => 'required',
        ])) {
            return redirect()->back()->withInput();
        }

        $tglkembali = $this->request->getVar('tgl_kembali');
        // dd($tglkembali);
        if ($tglkembali == NULL) {
            $tglkembali = NULL; 
        }

        $data = [
            'peminjam' => $this->request->getVar('peminjam'),
            'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
            'barang_pinjam' => $this->request->getVar('barang_pinjam'),
            'jml_pinjam' => $this->request->getVar('jml_pinjam'),
            'tgl_kembali' => $tglkembali,
            'kondisi' => $this->request->getVar('kondisi'),
        ];

        $save = $this->model->update($id, $data);

        if ($save) {
            session()->setFlashdata('success', 'Data Pinjam Barang Successfully edited!');
            return redirect()->to('/pinjam');
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $delete = $this->model->delete($id);

        if ($delete) {
            session()->setFlashdata('success', 'Data Pinjam Barang Successfully deleted!');
            return redirect()->to('/pinjam');
        } else {
            session()->setFlashdata('error', $this->model->errors());
            return redirect()->back();
        }
    }
}