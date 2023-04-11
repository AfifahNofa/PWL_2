<?php

namespace App\Http\Controllers;

use App\Models\MataKuliahModel;
use Illuminate\Http\Request;

class MataKuliahModelController extends Controller
{
    public function index(){
        $matkul = MataKuliahModel::all();
        return view('matkul')
                ->with('mk', $matkul);
    }
    public function create()
    {
        return view('matkul.create_matkul')
            ->with('url_form', url('/matkul'));
    }
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'kode' => 'required|string|max:4|unique:matkul,kode,',
            'nama' => 'required|string|max:100',
            'dosen' => 'required|string|max:100',
            'sks' => 'required|string|max:30',
        ]);

        $data =MataKuliahModel::create($request->except(['_token']));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('matkul')
            ->with('success', 'MataKuliah Berhasil Ditambahkan');
    }

    public function show(MataKuliahModel $matkul)
    {
        //
    }
   
    public function edit($id)
    {
        $matkul = MataKuliahModel::find($id);
        return view('matkul.create_matkul')
            ->with('mk', $matkul)
            ->with('url_form', url('/matkul/'. $id));
    }
    public function update(Request $request, $id)
    {
            $request->validate([
                'kode' => 'required|string|max:4|unique:matkul,kode,'.$id,
                'nama' => 'required|string|max:100',
                'dosen' => 'required|string|max:100',
                'sks' => 'required|string|max:30',
            ]);
    
            $data =MataKuliahModel::where('id','=', $id)->update($request->except(['_token', '_method', 'submit']));
            return redirect('matkul')
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
        MataKuliahModel::where('id', '=', $id)->delete();
        return redirect('matkul')
        ->with('success', 'MataKuliah Berhasil Dihapus');
    }
}
