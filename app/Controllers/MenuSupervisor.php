<?php

namespace App\Controllers;

use App\Models\KasirUserModel;

use App\Models\BarangModel;

class MenuSupervisor extends BaseController
{
    public function __construct()
    {
        $this->KasirUserModel = new KasirUserModel;
        $this->BarangModel = new BarangModel;
    }
    public function index()
    {
        $session = session();
        if ($session->get('id') == '') {
            return redirect()->to('/KasirLogin');
        }
        if ($session->get('role') == 2) {
            $isi_inventory = $this->BarangModel->cariBarang($this->request->getVar('kunci'));
            $data = [
                'judul' => 'KasirApp | Supervisor',
                'isi_barang' => $isi_inventory,
                'nickname' => $session->get('nickname')
            ];
            return view('kasirProject/supervisor', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function rekap()
    {
        $session = session();
        if ($session->get('id') == '') {
            return redirect()->to('/KasirLogin');
        }
        $data = [
            'judul' => 'KasirApp | Rekapitulasi',
            'nickname' => $session->get('nickname')
        ];

        return view('kasirProject/rekapitulasi', $data);
    }
    public function delete($id)
    {
        $this->BarangModel->delete($id);
        return redirect()->to('/MenuSupervisor');
    }
    public function tambah()
    {
        $insert = [
            'barang_id' => $this->request->getVar('barang_id'),
            'barang_nama' => $this->request->getVar('barang_nama'),
            'barang_stock' => $this->request->getVar('barang_stock')
        ];

        $this->BarangModel->insert($insert);

        return redirect()->to('/MenuSupervisor');
    }
    public function edit($id)
    {
        $session = session();
        if ($session->get('id') == '') {
            return redirect()->to('/KasirLogin');
        }
        $isi_barang = $this->BarangModel->where(['barang_id' => $id])->first();
        $data = [
            'judul' => 'KasirApp|Edit',
            'isi_barang' => $isi_barang,
            'nickname' => $session->get('nickname')
        ];

        return view('kasirProject/supervisor_edit', $data);
    }
    public function update()
    {
        $session = session();
        if ($session->get('id') == '') {
            return redirect()->to('/KasirLogin');
        }
        $isi = [
            'barang_id' => $this->request->getVar('barang_id'),
            'barang_nama' => $this->request->getVar('nama_barang'),
            'barang_stock' => $this->request->getVar('stock_barang'),
            'barang_harga' => $this->request->getVar('barang_harga')
        ];
        $this->BarangModel->replace($isi);
        return redirect()->to('/MenuSupervisor');
    }
}
