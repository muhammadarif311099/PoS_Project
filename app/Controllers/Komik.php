<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $KomikModel;

    public function __construct()
    {
        // untuk koneksi
        $this->KomikModel = new KomikModel();
    }
    public function index()
    {
        $komik = $this->KomikModel->getKomik();
        $data = [
            'judul' => 'Daftar Komik',
            'komik' => $komik
        ];
        return view('komik/index', $data);
    }
    public function detail($slug)
    {
        $komik = $this->KomikModel->getKomik($slug);
        $data = [
            'judul' => 'Detail Komik',
            'komik' => $komik
        ];

        return view('komik/detail', $data);
    }
    public function create()
    {
        $data = [
            'judul' => 'Halaman Tambah Komik',
            'validation' => \Config\Services::validation()
        ];

        return view('komik/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'judul' => 'required|is_unique[komikku.judul]',
            'penulis' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->KomikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'gambar' => $this->request->getVar('gambar')
        ]);

        return redirect()->to('/komik');
    }
    public function delete($id)
    {
        $this->KomikModel->delete($id);
        return redirect()->to('/komik');
    }
}
