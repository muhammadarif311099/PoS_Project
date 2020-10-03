<?php

namespace App\Controllers;

use App\Models\KasirUserModel;

class MenuAdmin extends BaseController
{
    public function __construct()
    {
        $this->KasirUserModel = new KasirUserModel;
    }
    public function index()
    {
        $session = session();
        if ($session->get('id') == '') {
            return redirect()->to('/KasirLogin');
        } else if ($session->get('role') != '1') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'judul' => 'KasirApp | Admin Homepage',
            'nickname' => $session->get('nickname')
        ];

        return view('kasirProject/menuAdmin', $data);
    }
    public function gantiPw()
    {
        $session = session();
        if ($session->get('id') == '') {
            return redirect()->to('/KasirLogin');
        }
        $key = $this->request->getVar('cari');

        $data_user = $this->KasirUserModel->cari($key);
        $data = [
            'judul' => 'KasirApp | List User',
            'validation' => \Config\Services::validation(),
            'data_user' => $data_user,
            'nickname' => $session->get('nickname')
        ];

        return view('kasirProject/chgPw', $data);
    }
    public function detailPw($user_id)
    {
        $session = session();
        if ($session->get('role') != 1) {
            return redirect()->to('/KasirLogin');
        }
        $isi_detail = $this->KasirUserModel->where(['user_id' => $user_id])->first();
        $data_detail = [
            'judul' => 'KasirApp | Detail Ganti Password',
            'isi_detail' => $isi_detail,
            'nickname' => $session->get('nickname')
        ];
        return view('kasirProject/detailPw', $data_detail);
    }
    public function changePw()
    {
        $session = session();
        if ($session->get('id') == '') {
            return redirect()->to('/KasirLogin');
        }
        $isi = $this->KasirUserModel->where(['user_id' => $this->request->getVar('id_user')])->first();
        $pw_old = $this->request->getVar('pw_old');
        $pw_new = $this->request->getVar('pw_new');
        $id = $this->request->getVar('id_user');

        // Hash the New Password
        $pw_baru = password_hash($pw_new, PASSWORD_DEFAULT);

        // Validate Password
        if (!$this->validate([
            'pw_old' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Lama Anda Salah'
                ]
            ],
            'pw_new' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Password Lama Anda Salah',
                    'min_length[3]' => 'Password Minimal 3 Karakter'
                ]
            ],
            'pw_confirm' => [
                'rules' => 'matches[pw_new]',
                'errors' => [
                    'matches' => 'Konfirmasi Password Salah'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/MenuAdmin/detailPw')->withInput()->with('validation', $validation);
        }


        // Check Old Password
        if (password_verify($pw_old, $isi['user_password'])) {
            $data = [
                'user_password' => $pw_baru
            ];
            $this->KasirUserModel->update($this->request->getVar('id_user'), $data);
            $session->setFlashdata('notif', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Password Berhasil Diganti!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            return redirect()->to('/MenuAdmin/gantiPw');
        } else {
            $session->setFlashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password Lama Anda Salah!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            return redirect()->to('/MenuAdmin/gantiPw');
        }
    }
}
