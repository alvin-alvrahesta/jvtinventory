<?php

namespace App\Http\Controllers;

use App\Models\MerkhwModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MerkhwController extends Controller
{
    public function __construct()
    {
        $this->MerkhwModel = new MerkhwModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'merkhw' => $this->MerkhwModel->allData()
        ];
        return view('hardware.v_merkhw', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_merk_hw' => ['required', 'unique:tbl_merk_hw'],
        ],[
            'nama_merk_hw.required' => 'Merk Hardware wajib diisi',
            'nama_merk_hw.unique' => 'Merk Hardware tersebut sudah ada.'
        ]);
        
        $data=[
            'nama_merk_hw' => Request()->nama_merk_hw    
        ];
        
        $this->MerkhwModel->addData($data);
        return redirect()->route('merkhw')->with('pesan', 'Data berhasil ditambahkan.');
    }

    public function insert2()
    {
        Request()->validate([
            'nama_merk_hw' => ['required', 'unique:tbl_merk_hw'],
        ],[
            'nama_merk_hw.required' => 'Merk Hardware wajib diisi',
            'nama_merk_hw.unique' => 'Merk Hardware tersebut sudah ada.'
        ]);
        
        $data=[
            'nama_merk_hw' => Request()->nama_merk_hw    
        ];
        
        $this->MerkhwModel->addData($data);
        return redirect()->back();
    }

    public function update($id_merk_hw)
    {
        Request()->validate([
            'nama_merk_hw' => 'required'
        ],[
            'nama_merk_hw.required' => 'Merk Hardware wajib diisi'
        ]);
        
        $data=[
            'nama_merk_hw' => Request()->nama_merk_hw    
        ];
        
        $this->MerkhwModel->editData($id_merk_hw, $data);       
        return redirect()->route('merkhw')->with('pesan', 'Data berhasil diedit.');

    }
    
    public function delete($id_merk_hw)
    {
        $this->MerkhwModel->deleteData($id_merk_hw);
        return redirect()->route('merkhw')->with('pesan', 'Data berhasil dihapus.');
    }
}
