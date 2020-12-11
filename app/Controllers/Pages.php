<?php

namespace App\Controllers;

use App\Models\UserModel;

class Pages extends BaseController
{

    public function __construct()
    {
        $this->usermodel = new UserModel();
    }

    public function pegawaihome()
    {
        $data = [
            'title' => 'Retail Obat-Obatan | Pegawai | Perusahaan ABC'
        ];
        return view('pages/pegawaihome', $data);
    }

    public function managerhome()
    {
        $data = [
            'title' => 'Retail Obat-Obatan | Manager | Perusahaan ABC'
        ];
        return view('pages/managerhome', $data);
    }

    public function login()
    {
        if (session()->get('logged_in') && (session()->get('role') == "manager")) {
            return redirect()->to('/managerhome');
        } else if (session()->get('logged_in') && (session()->get('role') == "pegawai")) {
            return redirect()->to('/pegawaihome');
        }

        return view('pages/login');
    }

    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->usermodel->where('username', $username)->first();
        if ($data) {
            if ($password == $data['password']) {
                if ($data['role'] == "manager") {
                    $session_data = [
                        'id' => $data['id'],
                        'logged_in' => TRUE,
                        'role' => "manager"
                    ];
                    session()->set($session_data);
                    return redirect()->to('/managerhome');
                } else if ($data['role'] == "pegawai") {
                    $session_data = [
                        'id' => $data['id'],
                        'logged_in' => TRUE,
                        'role' => "pegawai"
                    ];
                    session()->set($session_data);
                    return redirect()->to('/pegawaihome');
                }
            } else {
                session()->setFlashdata('pesan', 'Password salah.');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('pesan', 'Akun tidak ditemukan.');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    //--------------------------------------------------------------------

}
