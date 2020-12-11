<?php

namespace App\Controllers;

use App\Models\TransaksiBarangModel;

class LaporanTransaksi extends BaseController
{
    protected $transaksibarangmodel;

    public function __construct()
    {
        $this->transaksibarangmodel = new TransaksiBarangModel();
    }

    public function laporanmasuk()
    {
        $data = [
            'title' => 'Laporan Transaksi | Perusahaan ABC',
            'laporanmasuk' => $this->transaksibarangmodel->getTransaksiMasuk(),
            'laporankeluar' => $this->transaksibarangmodel->getTransaksiKeluar()
        ];
        return view('laporantransaksi/lihatlaporan', $data);
    }

    //--------------------------------------------------------------------

}
