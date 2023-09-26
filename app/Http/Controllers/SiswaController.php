<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function siswa(){
        $student = new SiswaModel();
        return view('siswa',['dataSis'=>$student->all()]);
    }   

    public function tambah(){
        return view('tambahsiswa');
    }
    public function simpen(Request $request){
        $sis = new SiswaModel();
        $validasi = $request->validate([
            'nisn'=>'required|unique:tb_siswa',
            'nama'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'kode_kelas'=>'required',
        ]);
        $sis->create($request->all());
        return redirect('siswa')->with('pesan','Data Berhasil Disimpan');
    }   

    public function edit($nisn){
        $s = new SiswaModel();
        return view ('editsiswa',['siswadata'=>$s->find($nisn)]);
    }
    public function update(Request $request,$nisn){
        $data = new SiswaModel();
        $validasi = $request->validate([
            'nisn'=>'required',
            'nama'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'kode_kelas'=>'required',
        ]);
        $data = $data->find($nisn);
        $data->update($request->all());
        return redirect('siswa')->with('pesan','Data Berhasil Disimpan');
    }

    public function hapus($nisn){
        $dat = new SiswaModel();
        $dat = $dat->find($nisn);
        $dat->delete();
        return redirect('siswa')->with('pesan','Data Berhasil DiHapus');
    }
}
