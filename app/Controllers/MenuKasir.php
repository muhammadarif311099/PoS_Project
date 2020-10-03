<?php

namespace App\Controllers;

use CodeIgniter\Config\Config;

use App\Models\KasirUserModel;
use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\RecordModel;

class MenuKasir extends BaseController
{
    public function __construct()
    {
        $this->KasirUserModel = new KasirUserModel;
        $this->BarangModel = new BarangModel;
        $this->TransaksiModel = new TransaksiModel;
        $this->RecordModel = new RecordModel;
    }
    public function index()
    {
        $db = \Config\database::connect();
        $builder = $db->table('barang');

        $session = session();
        if ($session->get('id') == '') {
            $session->setFlashdata('kasir_verif2', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda harus <strong>Login Dahulu!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            return redirect()->to('/KasirLogin');
        }

        // Untuk Pencarian Barang
        // Ambil data dari form -> cari dengan builder like -> kirim ke data -> tampilkan
        $data_cari = $this->request->getVar('cari_barang');
        $hasil_cari = $this->BarangModel->where(['barang_id' => $data_cari])->first();

        $data = [
            'judul' => 'KasirApp | Home'
        ];
        if ($hasil_cari) {
            $data = [
                'judul' => 'KasirApp | Home',
                'hasil_cari' => $hasil_cari
            ];
        } else {
            $data = [
                'judul' => 'KasirApp | Home',
                'hasil_cari' => [
                    'barang_nama' => '...'
                ]
            ];
        }

        return view('kasirProject/PoS', $data);
    }
    public function input_jual()
    {
        $session = session();

        if ($session->get('role') == 3 || $session->get('role') == 2) {
            $data_cari = $this->request->getVar('cari_barang');
            $hasil_cari = $this->BarangModel->where(['barang_id' => $data_cari])->first();
            $nama_barang = $this->request->getVar('input_barang');
            $qty = $this->request->getVar('qty');
            if ($qty) {
                $isi2 = $this->BarangModel->where(['barang_nama' => $nama_barang])->first();
                $jumlah_harga = $isi2['barang_harga'] * $qty;
                $rekap = $this->TransaksiModel->save([
                    'barang_id' => $isi2['barang_id'],
                    'barang_nama' => $isi2['barang_nama'],
                    'banyak_beli' => $qty,
                    'barang_harga' => $isi2['barang_harga'],
                    'total_bayar' => $jumlah_harga
                ]);
                $record = $this->RecordModel->save([
                    'barang_id' => $isi2['barang_id'],
                    'barang_nama' => $isi2['barang_nama'],
                    'total_beli' => $qty,
                    'satuan_harga' => $isi2['barang_harga'],
                    'total_harga' => $jumlah_harga
                ]);
            } else {
                $qty = 0;
            }
            $total_bayar = 0;
            if ($hasil_cari) {
                $data2 = [
                    'judul' => 'KasirApp | PoS',
                    'isi' => $this->TransaksiModel->findAll(),
                    'total_bayar' => $total_bayar,
                    'bayar' => $this->request->getVar('bayar'),
                    'hasil_cari' => $hasil_cari,
                    'nickname' => $session->get('nickname')
                ];
            } else {
                $data2 = [
                    'judul' => 'KasirApp | PoS',
                    'isi' => $this->TransaksiModel->findAll(),
                    'total_bayar' => $total_bayar,
                    'bayar' => $this->request->getVar('bayar'),
                    'hasil_cari' => [
                        'barang_nama' => '...'
                    ],
                    'nickname' => $session->get('nickname')
                ];
            }
            return view('kasirProject/PoS2', $data2);
        } else {
            $session->setFlashdata('err', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda harus <strong>Login</strong> dahulu!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            return redirect()->to('/KasirLogin');
        }
    }
    public function hapusTransaksi()
    {
        $this->TransaksiModel->emptyTable('rekap');
        return redirect()->to('/MenuKasir/input_jual');
    }
    public function transaksi()
    {
        $duit_bayar = $this->request->getVar('bayar');
        return redirect()->to('/MenuKasir/input_jual');
    }
    public function super()
    {
        $session = session();
        if ($session->get('role') == 2) {
            $data_cari = $this->request->getVar('cari_barang');
            $hasil_cari = $this->BarangModel->where(['barang_id' => $data_cari])->first();
            $nama_barang = $this->request->getVar('input_barang');
            $qty = $this->request->getVar('qty');
            if ($qty) {
                $isi2 = $this->BarangModel->where(['barang_nama' => $nama_barang])->first();
                $jumlah_harga = $isi2['barang_harga'] * $qty;
                $rekap = $this->TransaksiModel->save([
                    'barang_id' => $isi2['barang_id'],
                    'barang_nama' => $isi2['barang_nama'],
                    'banyak_beli' => $qty,
                    'barang_harga' => $isi2['barang_harga'],
                    'total_bayar' => $jumlah_harga
                ]);
                $record = $this->RecordModel->save([
                    'barang_id' => $isi2['barang_id'],
                    'barang_nama' => $isi2['barang_nama'],
                    'total_beli' => $qty,
                    'satuan_harga' => $isi2['barang_harga'],
                    'total_harga' => $jumlah_harga
                ]);
            } else {
                $qty = 0;
            }
            $total_bayar = 0;
            if ($hasil_cari) {
                $data2 = [
                    'judul' => 'KasirApp | PoS',
                    'isi' => $this->TransaksiModel->findAll(),
                    'total_bayar' => $total_bayar,
                    'bayar' => $this->request->getVar('bayar'),
                    'hasil_cari' => $hasil_cari
                ];
            } else {
                $data2 = [
                    'judul' => 'KasirApp | PoS',
                    'isi' => $this->TransaksiModel->findAll(),
                    'total_bayar' => $total_bayar,
                    'bayar' => $this->request->getVar('bayar'),
                    'hasil_cari' => [
                        'barang_nama' => '...'
                    ]
                ];
            }
            return view('kasirProject/PoS_sup', $data2);
        } else if ($session->get('role') == 3) {
            $session->setFlashdata('kasir', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda bukan <strong>Supervisor</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            return redirect()->to('/MenuKasir/input_jual');
        } else {
            $session->setFlashdata('kasir_verif', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda harus <strong>Login Dahulu!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            return redirect()->to('/KasirLogin');
        }
    }
    public function delete($id)
    {
        $this->TransaksiModel->delete($id);
        return redirect()->to('/MenuKasir/super');
    }
}
