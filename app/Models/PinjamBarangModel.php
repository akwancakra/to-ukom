<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamBarangModel extends Model
{
    protected $table = 'pinjam_barang';
    protected $primaryKey = 'id_pinjam';
    protected $allowedFields = ['peminjam', 'tgl_pinjam', 'barang_pinjam', 'jml_pinjam', 'tgl_kembali', 'kondisi'];

    public function search($keyword)
    {
        $builder = $this->table('pinjam_barang');
        $builder->like('peminjam', $keyword);
        $builder->orLike('barang_pinjam', $keyword);
        $builder->orLike('kondisi', $keyword);
        return $builder;
    }
}