<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Pencatatan Obat-Obatan | Perusahaan ABC'
        ];
        return view('pages/home', $data);
    }

    //--------------------------------------------------------------------

}
