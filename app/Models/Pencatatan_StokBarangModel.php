<?php

namespace App\Models;

use CodeIgniter\Model;

class Pencatatan_StokBarangModel extends Model
{
    protected $table = 'pencatatan_stokbarang';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_obat', 'nama_obat', 'slug', 'stok_obat'];

    public function getStokObat($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
