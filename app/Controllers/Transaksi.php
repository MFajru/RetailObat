<?php

namespace App\Controllers;

use App\Models\TransaksiBarangModel;

class Transaksi extends BaseController
{
    protected $transaksibarangmodel;

    public function __construct()
    {
        $this->transaksibarangmodel = new TransaksiBarangModel();
    }

    public function masuk()
    {
        $data = [
            'title' => 'Transaksi Obat Masuk | Perusahaan ABC',
            'transaksibarang' => $this->transaksibarangmodel->getTransaksiMasuk()
        ];


        return view('transaksi/transaksimasuk', $data);
    }

    public function keluar()
    {
        $data = [
            'title' => 'Transaksi Obat Keluar | Perusahaan ABC',
            'transaksibarang' => $this->transaksibarangmodel->getTransaksiKeluar()
        ];


        return view('transaksi/transaksikeluar', $data);
    }

    //--------------------------------------------------------------------

}
