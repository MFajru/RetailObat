<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiBarangModel extends Model
{
    protected $table = 'transaksibarang';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_obat', 'nama_obat', 'slug', 'jumlah_obat', 'keterangan_transaksi', 'waktu_transaksi'];

    public function getTransaksiMasuk()
    {
        $keterangan_masuk = "masuk";
        return $this->where('keterangan_transaksi', $keterangan_masuk)->findAll();
    }

    public function getTransaksiKeluar()
    {
        $keterangan_keluar = "keluar";
        return $this->where('keterangan_transaksi', $keterangan_keluar)->findAll();
    }
}
