<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table                = 'lokasi';
    protected $primaryKey           = 'id_lokasi';
    protected $allowedFields        = ['id_lokasi', 'nama_lokasi'];

    public function getnewid()
    {
        $query = $this->db->query("SELECT newidlokasi()");
        $row = $query->getRowArray();
        return $row;
    }
}
