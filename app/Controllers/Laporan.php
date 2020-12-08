<?php

namespace App\Controllers;

use App\Models\ModelLaporan;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->ModelLaporan =  new ModelLaporan();
    }
    public function index()
    {

        $data = [
            'title' => 'Laporan Penjualan | Perusahaan ABC',
            'laporan' => $this->ModelLaporan->alldata()
        ];
        return view('laporan/index', $data);
    }

    //--------------------------------------------------------------------

}
