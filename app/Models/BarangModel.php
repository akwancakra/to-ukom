<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table                = 'barang';
    protected $primaryKey           = 'id_barang';
    protected $allowedFields        = ['id_barang', 'nama_barang', 'spesifikasi', 'lokasi', 'kondisi', 'sumber_dana'];

    public function getnewid()
    {
        $query = $this->db->query("SELECT newidbarang()");
        $row = $query->getRowArray();
        return $row;
    }
}
