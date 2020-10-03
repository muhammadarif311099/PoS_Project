<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Home'
        ];

        return view('pages/halaman_utama', $data);
    }

    public function about()
    {
        $data = [
            'judul' => 'About'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'judul' => 'Contact Us',
            'kontak' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Salak No.5',
                    'kota' => 'Madiun'
                ],
                [
                    'tipe' => 'Kampus',
                    'alamat' => 'Bulaksumur',
                    'kota' => 'Yogyakarta'
                ]
            ]
        ];

        return view('pages/contact_us', $data);
    }

    //--------------------------------------------------------------------

}
