<?php

namespace App\Controllers;

use CodeIgniter\CodeIgniter;

use App\Models\KasirUserModel;

class KasirRegist extends BaseController
{
    public function __construct()
    {
        $this->KasirUserModel = new KasirUserModel;
    }

    public function index()
    {
        $data = [
            'judul' => 'Regist | Kasir',
            'validation' => \Config\Services::validation()
        ];
        return view('kasirProject/register', $data);
    }

    public function register()
    {
        if (!$this->validate([
            'name' => 'required',
            'email' => 'required',
            'password1' => 'required|min_length[3]',
            'password2' => 'matches[password1]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/KasirRegist')->withInput()->with('validation', $validation);
        }
        $password = password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT);
        $this->KasirUserModel->save([
            'user_email' => $this->request->getVar('email'),
            'user_password' => $password
        ]);
        return redirect()->to('/KasirLogin');
    }

    //--------------------------------------------------------------------

}
