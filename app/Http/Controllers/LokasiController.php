<?php

namespace App\Http\Controllers;

use App\Models\LokasiModel;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function __construct()
    {
        $this->LokasiModel = new LokasiModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'departemen' => $this->LokasiModel->allDepartemen(),
            'lokasi' => $this->LokasiModel->allData(),
            
        ];
        return view('hardware.v_lokasi', $data);
    }

    public function edit($id_lokasi)
    {
        if (!$this->LokasiModel->detailData($id_lokasi))
        {
            abort(404);
        }
        $data = [
            'lokasi' => $this->LokasiModel->allLokasi()
        ];
        return view('hardware.v_lokasi', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_lokasi' => 'required',
            'id_departemen' => 'required'
        ],[
            'nama_lokasi.required' => 'Lokasi Hardware wajib diisi',
            'id_departemen.required' => 'Departemen Hardware wajib dipilih'
        ]);
        
        $data=[
            'nama_lokasi' => Request()->nama_lokasi,
            'id_departemen_lokasi' => Request()->id_departemen_lokasi
        ];
        
        $this->LokasiModel->addData($data);
        return redirect()->route('lokasi')->with('pesan', 'Data berhasil ditambahkan.');

    }

    public function update($id_lokasi)
    {
        Request()->validate([
            'nama_lokasi' => 'required'
        ],[
            'nama_lokasi.required' => 'Lokasi Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_lokasi' => Request()->nama_lokasi,
            'id_departemen_lokasi' => Request()->id_departemen
        ];
        
        $this->LokasiModel->editData($id_lokasi, $data);       
        return redirect()->route('lokasi')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_lokasi)
    {
        $this->LokasiModel->deleteData($id_lokasi);
        return redirect()->route('lokasi')->with('pesan', 'Data berhasil dihapus.');
    }
}
