<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'barang_id';
    protected $allowedFields = ['barang_id', 'barang_nama', 'barang_stock', 'barang_harga'];
    protected $useTimestamps = true;

    public function cariBarang($kunci = false)
    {
        if ($kunci == false) {
            return $this->findAll();
        }
        return $this->like('barang_nama', $kunci)->find();
    }
}
