<?php

namespace App\Models;

use CodeIgniter\Model;

class KasirUserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_email', 'user_password', 'username'];
    protected $useTimestamps = true;

    public function cari($key = false)
    {
        if ($key == false) {
            return $this->findAll();
        }

        return $this->like('username', $key)->find();
    }
}
