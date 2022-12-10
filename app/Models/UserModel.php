<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'nama', 'username', 'password', 'level'];

    protected $skipValidation = false;
    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }
    
    public function search($keyword)
    {
        $builder = $this->table('user');
        $builder->like('nama', $keyword);
        $builder->orLike('username', $keyword);
        $builder->orLike('level', $keyword);
        return $builder;
    }
}