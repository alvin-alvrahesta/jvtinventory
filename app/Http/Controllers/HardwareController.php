<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HardwareModel;

class HardwareController extends Controller
{
    public function __construct()
    {
        $this->HardwareModel = new HardwareModel();
    }
    
    // public function atWorkstations()
    // {
    //     $data = [
    //         'workstations' => $this->HardwareModel->workstations()
    //     ];
    //     return view('hardware.v_workstations', $data);
    // }

    public function index()
    {
        $data = [
            'hardware' => $this->HardwareModel->allData()
        ];
        return view('hardware.v_hardware', $data);
    }

    public function getHardware()
    {
        $data = [
            'allData' => $this->HardwareModel->allData()
        ];
        return view('hardware.v_hardware', $data);
    }
    
    public function detail($id_hw)
    {
        if (!$this->HardwareModel->detailData($id_hw))
        {
            abort(404);
        }
        $data = [
            'hardware' => $this->HardwareModel->detailData($id_hw)
        ];
        return view('hardware.v_detailhw', $data);
    }
    
    public function add()
    {
        return view('hardware.v_addhw');
    }
    
    public function insert()
    {
        Request()->validate([
            'id_nama_hw' => 'required',
            'id_merk_hw' => 'required',
            'seri_hw' => 'required',
            'id_kategori_hw' => 'required',
            'kode_asset' => 'required',
            'id_kondisi' => 'required',
            'harga_hw' => 'required|numeric',
            'id_lokasi' => 'required',
            'id_departemen' => 'required',
            'tgl_beli_hw' => 'required',
            'tgl_batas_garansi' => 'required',
            'deskripsi_hw' => 'required',
            'id_pemakai' => 'required'
        ],[
            'id_nama_hw.required' => 'Nama Hardware wajib diisi',
            'id_merk_hw.required' => 'Merk Hardware wajib diisi',
            'seri_hw.required' => 'Seri Hardware wajib diisi',
            'id_kategori_hw.required' => 'Kategori wajib diisi',
            'kode_asset.required' => 'Kode Asset wajib diisi',
            'harga_hw.required' => 'Harga Hardware wajib diisi',
            'harga_hw.numeric' => 'Harga Hardware berupa angka',
            'id_lokasi.required' => 'id_Lokasi wajib diisi',
            'id_departemen.required' => 'id_Departemen wajib diisi',
            'tgl_beli_hw.required' => 'Tanggal Beli Hardware wajib diisi',
            'tgl_batas_garansi.required' => 'Tanggal Batas Garansi Hardware wajib diisi',
            'id_pemakai.required' => 'Pemakai wajib diisi'
        ]);
        
        $data=[
            'id_nama_hw' => Request()->id_nama_hw,
            'id_merk_hw' => Request()->id_merk_hw,
            'seri_hw' => Request()->seri_hw,
            'id_kategori_hw' => Request()->id_kategori_hw,
            'kode_asset' => Request()->kode_asset,
            'id_kondisi' => Request()->id_kondisi,
            'harga_hw' => Request()->harga_hw,
            'id_lokasi' => Request()->id_lokasi,
            'id_departemen' => Request()->id_departemen,
            'tgl_beli_hw' => Request()->tgl_beli_hw,
            'tgl_batas_garansi' => Request()->tgl_batas_garansi,
            'deskripsi_hw' => Request()->deskripsi_hw,
            'id_pemakai' => Request()->id_pemakai            
        ];
        
        $this->HardwareModel->addData($data);
        return redirect()->route('hardware.v_hardware')->with('pesan', 'Data berhasil ditambahkan.');

    }
    
    public function edit($id_hw)
    {
        if (!$this->HardwareModel->detailData($id_hw))
        {
            abort(404);
        }
        $data = [
            'hardware' => $this->HardwareModel->detailData($id_hw)
        ];
        return view('hardware.v_edithw', $data);
    }
    
    public function update($id_hw)
    {
        Request()->validate([
            'id_nama_hw' => 'required',
            'id_merk_hw' => 'required',
            'seri_hw' => 'required',

            'id_kategori_hw' => 'required',
            'harga_hw' => 'required|numeric',

            'tgl_beli_hw' => 'required',
            'tgl_batas_garansi' => 'required'
        ],[
            'id_nama_hw.required' => 'Nama Hardware wajib diisi',
            'id_merk_hw.required' => 'Merk Hardware wajib diisi',
            'seri_hw.required' => 'Seri Hardware wajib diisi',
            'id_kategori_hw.required' => 'Kategori Hardware wajib diisi',
            'harga_hw.required' => 'Harga Hardware wajib diisi',
            'harga_hw.numeric' => 'Harga Hardware berupa angka',
            'tgl_beli_hw.required' => 'Tanggal Beli Hardware wajib diisi',
            'tgl_batas_garansi.required' => 'Tanggal Batas Garansi Hardware wajib diisi'
        ]);
        
        $data=[
            'id_nama_hw' => Request()->id_nama_hw,
            'id_merk_hw' => Request()->id_merk_hw,
            'seri_hw' => Request()->seri_hw,
            'id_kategori_hw' => Request()->id_kategori_hw,
            'harga_hw' => Request()->harga_hw,
            'tgl_beli_hw' => Request()->tgl_beli_hw,
            'tgl_batas_garansi' => Request()->tgl_batas_garansi     
        ];
        
        $this->HardwareModel->editData($id_hw, $data);       
        return redirect()->route('hardware')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_hw)
    {
        $this->HardwareModel->deleteData($id_hw);
        return redirect()->route('hardware')->with('pesan', 'Data berhasil dihapus.');
    }
    
}  
