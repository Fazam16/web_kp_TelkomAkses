<?php

namespace App\Controllers;

use App\Models\AkunModels;
use App\Models\TotalMaterial;
use App\Models\KeluarModels;
use App\Models\BaruModels;

class WHSO extends BaseController
{

    protected $akunModels, $totalModels, $keluarModels, $baruModels;

    // FUNGSI KONSTRUKTOR
    public function __construct() {
        $this->totalModels = new TotalMaterial();
        $this->akunModels = new AkunModels();
        $this->keluarModels = new KeluarModels();
        $this->baruModels = new BaruModels();
    }

    // SELESAI KONSTRUKTROR
    
    // FUNGSI YANG MENGATUR HALAMAN INDEX
    public function index() {
        $data = [
            'title' => 'Selamat Datang di Website Gudang WHSO'
        ];
        return view('pages/index', $data);
    }

    public function auth() {
        $username = $this->request->getPost('uname');
        $password = $this->request->getPost('password');
        $data = $this->akunModels->where('uname', $username)->first();
        if($data){
            $pass = $data['password'];
            if(password_verify($password, $pass)){
                return redirect()->to('material');
            } else{  
                session()->setFlashdata('erorLoginPassword', 'Password yang Anda masukan salah');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('erorLoginUname', 'Username yang Anda masukan salah');
            return redirect()->to('/');
        }
    }
    // SELESAI HALAMAN INDEX
    
    // FUNGSI YANG MENGATUR HALAMAN HOME
    public function material() {
        $this->totalModels->orderBy('type', 'ASC');
        $data = [
            'title' => 'Material NTE Gudang WHSO',
            'total' => $this->totalModels->getData()
        ];
        return view('pages/material', $data);
    }

    public function excel1() {
        $data = [
            'sementara' => $this->totalModels->findAll()
        ];  
         return view('pages/export/total_material', $data);
    }

    public function prosesHapusData() {
        $sn = $this->request->getPost('sn');
        
        $pecah = explode(PHP_EOL, $sn);
        $jumlah = count($pecah);    
     
        if($sn != "") {
            for($i = 0; $i < $jumlah; $i++) {
                $this->totalModels->where('sn', $pecah[$i])->delete();
                session()->setFlashdata('success', 'Data Berhasil Dihapus');
            }
        } 
        return redirect()->to('/material');
    }

    public function hapusDataNTE($slug) {
        $this->totalModels->where('sn', $slug)->delete();
        return redirect()->to('/material');
    }
    // SELESAI HALAMAN HOME 

    // FUNGSI YANG MENGATUR HALAMAN STOCK OPNAME
    public function stockopname() {
        $this->totalModels->orderBy('id', 'DESC');
        $this->keluarModels->orderBy('id', 'ASC');
        $data = [
            'title' => 'Halaman SO',
            'keluar' => $this->keluarModels->getData(),
            'masuk' => $this->totalModels->getData()
        ];
        return view('pages/so', $data);
    }

    public function prosesso() {
        if($this->request->getPost('sn') == '') {
            session()->setFlashdata('isi', 'Harap isi kolom Nomor SN');
            return redirect()->to("/stock-opname");
        }
    
        if($this->validate([
            'sn' => 'is_unique[total_material.sn]'
        ])) {
            session()->setFlashdata('eror', 'Nomor SN tidak ditemukan');
            return redirect()->to('/stock-opname');
        }

        $sn = $this->request->getPost('sn');

        $type = $this->totalModels->getSN($sn);
        $this->totalModels->where('sn', $sn)->delete();
    
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d");

        $this->keluarModels->save([
            'sn' => $sn,
            'mac' => $this->request->getPost('mac'),
            'mitra' => $this->request->getPost('mitra'),
            'layanan' => $this->request->getPost('layanan'),
            'tanggal' => $date,
            'sc' => $this->request->getPost('sc'),
            'notel' => $this->request->getPost('notel'),
            'nama_teknisi' => $this->request->getPost('nama_teknisi'),
            'type' => $type['type'],
        ]);
        session()->setFlashdata('success', 'Data berhasil diinput');
        return redirect()->to('/stock-opname');
        
    }

    public function search() {
        $sn = $this->request->getPost('sn');
        $dapat = $this->keluarModels->getSN($sn);
        $dapat1 = $this->totalModels->getSN($sn);

        if($this->validate([
            'sn' => 'is_unique[material_keluar.sn]' 
        ])) {
            if($this->validate([
                'sn' => 'is_unique[total_material.sn]' 
            ])) {
                session()->setFlashdata('erorSearching', 'Data tidak ditemukan');
                return redirect()->to('/stock-opname');
            } else 
                session()->setFlashdata('search', $dapat1);
        } else 
            session()->setFlashdata('search', $dapat);

        return redirect()->to('/stock-opname');
    }

    public function update() {
        $this->keluarModels->save([
            'id' => $this->request->getPost('id'),
            'mitra' => $this->request->getPost('mitra'),
            'layanan' => $this->request->getPost('layanan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'sc' => $this->request->getPost('sc'),
            'notel' => $this->request->getPost('notel'),
            'nama_teknisi' => $this->request->getPost('nama_teknisi'),
        ]);

        $this->totalModels->save([
            'id' => $this->request->getPost('id'),
            'mitra' => $this->request->getPost('mitra'),
            'layanan' => $this->request->getPost('layanan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'sc' => $this->request->getPost('sc'),
            'notel' => $this->request->getPost('notel'),
            'nama_teknisi' => $this->request->getPost('nama_teknisi'),
        ]);
        return redirect()->to('/stock-opname');
    }

    public function rusak() {
        if($this->request->getPost('sn') == ''){
            session()->setFlashdata('nomorsn', 'Harap masukan Nomor SN Material');
            return redirect()->to("/stock-opname");
        }

        if($this->request->getPost('rusak') == '') {
            session()->setFlashdata('dismantling', 'Harap masukan kondisi material');
            return redirect()->to("/stock-opname");
        }

        if($this->request->getPost('type') == '') {
            session()->setFlashdata('type', 'Harap masukan jenis material');
            return redirect()->to("/stock-opname");
        }

        if(!$this->validate([
            'sn' => 'is_unique[total_material.sn]'
        ])) {
            session()->setFlashdata('erorDismantling', 'terdapat duplikat terhadap nomor SN yang sudah ada');
            return redirect()->to('/stock-opname');
        }

        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d");
    
        $this->totalModels->save([
            'sn' => $this->request->getPost('sn'),
            'mac' => $this->request->getPost('mac'),
            'mitra' => $this->request->getPost('mitra'),
            'layanan' => $this->request->getPost('layanan'),
            'tanggal' => $date,
            'sc' => $this->request->getPost('sc'),
            'notel' => $this->request->getPost('notel'),
            'nama_teknisi' => $this->request->getPost('nama_teknisi'),
            'type' => $this->request->getPost('rusak'),
            'rusak' => $this->request->getPost('type')
        ]);
        
        return redirect()->to('/stock-opname');
    }

    public function hapusso($slug) {
        $this->keluarModels->where('sn', $slug)->delete();
        return redirect()->to('/stock-opname');
    }

    public function hapusmaterialkeluar($slug) {
        $this->keluarModels->where('sn', $slug)->delete();
        return redirect()->to('/stock-opname');
    }
    // SELESAI HALAMAN STOCK OF NAME

    // FUNGSI YANG MENGATUR HALAMAN INPUT MATERIAL
    public function input() {
        $data = [
            'title' => 'Input Barang'
        ];
        return view('pages/input', $data);
    }

    public function prosesInput() {
        if($this->request->getPost('type') == "") {
            session()->setFlashdata('erorType', 'Harap masukan type material');
            return redirect()->to('/input-barang-masuk');
        }
        
        $material = $this->request->getPost('sn');
        $array = explode(PHP_EOL, $material);
        $batas = count($array);
        
        if($array[count($array)-1] == '') {
            $batas = $batas - 1;
        }

        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d");
       
        for($i = 0; $i < $batas; $i++) {
            $this->totalModels->save([
                'sn' => $array[$i],
                'tanggal' => $date,
                'type' => $this->request->getPost('type')
            ]);
            $this->baruModels->save([
                'sn' => $array[$i],
                'tanggal' => $date,
                'type' => $this->request->getPost('type')
            ]);
        } 
        session()->setFlashdata('success', 'Data berhasil diinput');
        return redirect()->to('/input-barang-masuk');
    }

    public function lihatData() {
        $this->baruModels->orderBy('type', 'ASC');
        $data = [
            'title' => 'Penginputan data masuk terakhir',
            'input' => $this->baruModels->findAll()
        ];

        return view('pages/data_baru', $data);
    }

    public function hapus() {
        $this->baruModels->query('TRUNCATE TABLE material_baru');
        return redirect()->to('/lihat-data');
    }

    public function excel() {
        $data = [
            'sementara' => $this->baruModels->findAll()
        ];  
         return view('pages/export/sementara', $data);
    }
    // SELESAI HALAMAN INPUT MATERIAL

    // MAINTANANCE AKUN
    public function editAkun() {
        $usernameLama = $this->request->getPost('uname_old');
        $usernameBaru = $this->request->getPost('uname');
        $data = $this->akunModels->getUname($usernameLama);
        $password = $this->request->getPost('password');
        $password1 = $this->request->getPost('password1');
        
        $hash = password_hash($password,PASSWORD_DEFAULT);


        if(isset($data['uname']) && isset($data['password'])) {
            if($usernameLama == $data['uname']) {
                if($password1 == $password) {
                    $this->akunModels->save([
                        'id' => $data['id'],
                        'uname' => $usernameBaru,
                        'password' => $hash
                    ]);
                   
                    return redirect()->to('/');
                }
            }
        }
        return redirect()->to('/stock-opname');
    }

    public function logout() {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }
    // SELESAI MAINTANANCE AKUN

    public function sementaronian() {
        return view('pages/inputDismantling');
    }

    public function prosessementaronian() {
        $sn = $this->request->getPost('sementaro');
        $sementaro = explode(PHP_EOL, $sn);
        $type = $this->request->getPost('type');
        
        for($i = 0; $i < count($sementaro); $i++) {
            $this->totalModels->save([
                'sn' => $sementaro[$i],
                'type' => $type
            ]);
        }

        return redirect()->to('/WHSO/sementaronian');
    }
}