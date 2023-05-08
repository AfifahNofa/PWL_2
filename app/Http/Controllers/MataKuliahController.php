<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\MataKuliahModel;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index(){
        $matakuliah = MataKuliah::all();
        return view('matakuliah.matakuliah')
                ->with('matkul', $matakuliah);
    }
    public function create()
    {
        return view('matakuliah.create_matakuliah')
            ->with('url_form', url('/matakuliah'));
    }
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama_matkul' => 'required|string|max:30|unique:matakuliah,id,',
            'sks' => 'required|integer',
            'jam' => 'required|integer',
            'semester' => 'required|string|max:12',
        ]);

        $data =MataKuliah::create($request->except(['_token']));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('matakuliah')
            ->with('success', 'MataKuliah Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $matakuliah = MataKuliah::find($id);
        return view('matakuliah.detail', compact('matakuliah'));
    }
   
    public function edit($id)
    {
        $matakuliah = MataKuliah::find($id);
        return view('matakuliah.create_matakuliah')
        ->with('matkul', $matakuliah)
        ->with('url_form', url('/matakuliah/'. $id));

    }
    public function update(Request $request, $id)
    {
            $request->validate([
                'nama_matkul' => 'required|string|max:30|unique:matakuliah,id,'.$id,
                'sks' => 'required|integer',
                'jam' => 'required|integer',
                'semester' => 'required|string|max:12',
            ]);
    
            $data =MataKuliah::where('id','=', $id)->update($request->except(['_token', '_method', 'submit']));
            return redirect('matakuliah')
                ->with('success', 'MataKuliah Berhasil Diedit');
        }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MataKuliah::where('id', '=', $id)->delete();
        return redirect('matakuliah')
        ->with('success', 'MataKuliah Berhasil Dihapus');
    }
}
