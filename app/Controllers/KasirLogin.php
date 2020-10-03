<?php

namespace App\Controllers;

use App\Models\KasirUserModel;

class KasirLogin extends BaseController
{
    public function __construct()
    {
        $this->KasirUserModel = new KasirUserModel;
    }
    public function index()
    {
        $session = session();
        $data = [
            'judul' => 'Login | Kasir'
        ];
        return view('kasirProject/login', $data);
    }
    public function login()
    {
        $session = session();
        $data = [
            'judul' => 'Login | Kasir',
        ];
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $isi = $this->KasirUserModel->where(['user_email' => $email])->first();
        // dd($isi);

        if ($isi) {
            if (password_verify($password, $isi['user_password'])) {
                if ($isi['role_id'] == 2) {
                    $data_login = [
                        'email' => $isi['user_email'],
                        'id' => $isi['user_id'],
                        'role' => $isi['role_id'],
                        'nickname' => $isi['nickname']
                    ];
                    $session->set($data_login);
                    return redirect()->to('/MenuSupervisor');
                } else if ($isi['role_id'] == 3) {
                    $data_login = [
                        'email' => $isi['user_email'],
                        'id' => $isi['user_id'],
                        'role' => $isi['role_id'],
                        'nickname' => $isi['nickname']
                    ];
                    $session->set($data_login);
                    return redirect()->to('/MenuKasir/input_jual');
                } else if ($isi['role_id'] == 1) {
                    $data_login = [
                        'email' => $isi['user_email'],
                        'id' => $isi['user_id'],
                        'role' => $isi['role_id'],
                        'nickname' => $isi['nickname']
                    ];
                    $session->set($data_login);
                    return redirect()->to('/MenuAdmin');
                }
            }
        }
        return view('kasirProject/login', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/KasirLogin');
    }

    //--------------------------------------------------------------------

}
