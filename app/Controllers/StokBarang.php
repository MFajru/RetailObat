<?php

namespace App\Controllers;

use App\Models\Pencatatan_StokBarangModel;
use App\Models\TransaksiBarangModel;

class StokBarang extends BaseController
{
    protected $pencatatan_stokbarangModel;
    protected $transaksibarang;

    public function __construct()
    {
        $this->pencatatan_stokbarangModel = new Pencatatan_StokBarangModel();
        $this->transaksibarang = new TransaksiBarangModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Stok Obat | Perusahaan ABC',
            'stokbarang' => $this->pencatatan_stokbarangModel->getStokObat()
        ];


        return view('stokbarang/lihatstok', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Obat | Perusahaan ABC',
            'validation' => \Config\Services::validation()
        ];

        return view('stokbarang/tambahbarang', $data);
    }

    public function save()
    {

        //validasi input
        if (!$this->validate([
            'kode_obat' => [
                'rules' => 'required|is_unique[pencatatan_stokbarang.kode_obat]|max_length[6]',
                'errors' => [
                    'required' => 'Kode Obat harus diisi.',
                    'is_unique' => 'Kode Obat sudah terdaftar',
                    'max_length' => 'Kode Obat tidak boleh lebih dari 6 karakter.'
                ]
            ],
            'nama_obat' => [
                'rules' => 'required|is_unique[pencatatan_stokbarang.nama_obat]|max_length[128]',
                'errors' => [
                    'required' => 'Nama Obat harus diisi.',
                    'is_unique' => 'Nama Obat sudah terdaftar',
                    'max_length' => 'Nama Obat tidak boleh lebih dari 128 karakter.'
                ]
            ],
            'stok_obat' => [
                'rules' => 'required|max_length[6]',
                'errors' => [
                    'required' => 'Stok Obat harus diisi.',
                    'max_length' => 'Stok Obat tidak boleh lebih dari 6 digit angka.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/tambahobat')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('nama_obat'), '-', true);
        $this->pencatatan_stokbarangModel->save([
            'kode_obat' => $this->request->getVar('kode_obat'),
            'nama_obat' => $this->request->getVar('nama_obat'),
            'slug' => $slug,
            'stok_obat' => $this->request->getVar('stok_obat')
        ]);
        $keterangan_transaksi = "masuk";
        $this->transaksibarang->save([
            'kode_obat' => $this->request->getVar('kode_obat'),
            'nama_obat' => $this->request->getVar('nama_obat'),
            'slug' => $slug,
            'jumlah_obat' => $this->request->getVar('stok_obat'),
            'keterangan_transaksi' => $keterangan_transaksi,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/pencatatan_stokbarang');
    }

    public function delete($id)
    {
        $this->pencatatan_stokbarangModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/pencatatan_stokbarang');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Obat | Perusahaan ABC',
            'validation' => \Config\Services::validation(),
            'stokbarang' => $this->pencatatan_stokbarangModel->getStokObat($slug)
        ];

        return view('stokbarang/ubahbarang', $data);
    }

    public function update($id)
    {
        $dataLama = $this->pencatatan_stokbarangModel->getStokObat($this->request->getVar('slug'));

        if ($dataLama['kode_obat'] == $this->request->getVar('kode_obat')) {
            $rules_kode_obat = 'required|max_length[6]';
        } else {
            $rules_kode_obat = 'required|max_length[6]|is_unique[pencatatan_stokbarang.kode_obat]';
        }
        if ($dataLama['nama_obat'] == $this->request->getVar('nama_obat')) {
            $rules_nama_obat = 'required|max_length[128]';
        } else {
            $rules_nama_obat = 'required|max_length[128]|is_unique[pencatatan_stokbarang.nama_obat]';
        }
        if (!$this->validate([
            'kode_obat' => [
                'rules' => $rules_kode_obat,
                'errors' => [
                    'required' => 'Kode Obat harus diisi.',
                    'is_unique' => 'Kode Obat sudah terdaftar',
                    'max_length' => 'Kode Obat tidak boleh lebih dari 6 karakter.'
                ]
            ],
            'nama_obat' => [
                'rules' => $rules_nama_obat,
                'errors' => [
                    'required' => 'Nama Obat harus diisi.',
                    'is_unique' => 'Nama Obat sudah terdaftar',
                    'max_length' => 'Nama Obat tidak boleh lebih dari 128 karakter.'
                ]
            ],
            'stok_obat' => [
                'rules' => 'required|max_length[6]',
                'errors' => [
                    'required' => 'Stok Obat harus diisi.',
                    'max_length' => 'Stok Obat tidak boleh lebih dari 6 digit angka.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/editobat/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }
        $slug = url_title($this->request->getVar('nama_obat'), '-', true);
        $this->pencatatan_stokbarangModel->save([
            'id' => $id,
            'kode_obat' => $this->request->getVar('kode_obat'),
            'nama_obat' => $this->request->getVar('nama_obat'),
            'slug' => $slug,
            'stok_obat' => $this->request->getVar('stok_obat')
        ]);
        if ($dataLama['stok_obat'] < $this->request->getVar('stok_obat')) {
            $keterangan_transaksi = "masuk";
            $this->transaksibarang->save([
                'kode_obat' => $this->request->getVar('kode_obat'),
                'nama_obat' => $this->request->getVar('nama_obat'),
                'slug' => $slug,
                'jumlah_obat' => ($this->request->getVar('stok_obat') - $dataLama['stok_obat']),
                'keterangan_transaksi' => $keterangan_transaksi,
            ]);
        } else if ($dataLama['stok_obat'] > $this->request->getVar('stok_obat')) {
            $keterangan_transaksi = "keluar";
            $this->transaksibarang->save([
                'kode_obat' => $this->request->getVar('kode_obat'),
                'nama_obat' => $this->request->getVar('nama_obat'),
                'slug' => $slug,
                'jumlah_obat' => ($dataLama['stok_obat'] - $this->request->getVar('stok_obat')),
                'keterangan_transaksi' => $keterangan_transaksi
            ]);
        }

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/pencatatan_stokbarang');
    }
}
