<?php

namespace App\Models;

use CodeIgniter\Model;

class RecordModel extends Model
{
    protected $table = 'record_jual';
    protected $allowedFields = ['barang_id', 'barang_nama', 'total_beli', 'satuan_harga', 'total_harga'];
    protected $useTimestamps = true;
}
