<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['barang_id', 'barang_nama', 'barang_harga', 'banyak_beli', 'total_bayar'];
    protected $useTimestamps = true;
    protected $primaryKey = 'transaksi_id';
}
