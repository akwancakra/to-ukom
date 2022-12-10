<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\LokasiModel;
use App\Models\SumberModel;


class Home extends BaseController
{
    protected $BarangModel;
    protected $SumberModel;
    protected $LokasiModel;

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->SumberModel = new SumberModel();
        $this->LokasiModel = new LokasiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('index', $data);
    }

    public function barang()
    {
        $newid = $this->BarangModel->getnewid();
        foreach ($newid as $id)
            $data = [
                'title' => 'Barang',
                'barang' => $this->BarangModel->findAll(),
                'new_id' => $id
            ];
        // dd($data);
        return view('pages/barang', $data);
    }

    public function lokasi()
    {
        $newid = $this->LokasiModel->getnewid();
        foreach ($newid as $id)
            $data = [
                'title' => 'Lokasi',
                'lokasi' => $this->LokasiModel->findAll(),
                'new_id' => $id
            ];
        return view('pages/lokasi', $data);
    }

    public function sumberdana()
    {
        $newid = $this->SumberModel->getnewid();
        foreach ($newid as $id)
            $data = [
                'title' => 'Sumber Dana',
                'sumber_dana' => $this->SumberModel->findAll(),
                'new_id' => $id
            ];
        return view('pages/sumber', $data);
    }
}
