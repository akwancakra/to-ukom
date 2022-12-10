<?php

namespace App\Models;

use CodeIgniter\Model;

class SumberModel extends Model
{
    protected $table                = 'sumber_dana';
    protected $primaryKey           = 'id_sumber';
    protected $allowedFields        = ['id_sumber', 'nama_sumber'];

    public function getnewid()
    {
        $query = $this->db->query("SELECT newidsumber()");
        $row = $query->getRowArray();
        return $row;
    }
}
