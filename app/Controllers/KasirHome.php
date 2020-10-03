<?php

namespace App\Controllers;

class KasirHome extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Home | Kasir'
        ];
        return view('kasirProject/home', $data);
    }

    //--------------------------------------------------------------------

}
