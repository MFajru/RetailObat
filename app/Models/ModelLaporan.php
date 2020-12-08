<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model
{
    public function alldata()
    {
        return $this->db->table('pencatatan_stokbarang')->get()->getResultArray();
    }
}