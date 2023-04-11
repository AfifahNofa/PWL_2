<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;
use Illuminate\Http\Request;

class KeluargaModelController extends Controller
{
    public function index(){
        $keluarga = KeluargaModel::all();
        return view('keluarga')
                ->with('kg', $keluarga);
    }
    public function create()
    {
        return view('keluarga.create_keluarga')
            ->with('url_form', url('/keluarga'));
    }
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama' => 'required|string|max:50',
            'ttl' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'hobi' => 'required|string|max:50',
        ]);

        $data =KeluargaModel::create($request->except(['_token']));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('keluarga')
            ->with('success', 'keluarga Berhasil Ditambahkan');
    }

    public function show(KeluargaModel $keluarga)
    {
        //
    }
   
    public function edit($id)
    {
        $keluarga = KeluargaModel::find($id);
        return view('keluarga.create_keluarga')
            ->with('kg', $keluarga)
            ->with('url_form', url('/keluarga/'. $id));
    }
    public function update(Request $request, $id)
    {
            $request->validate([
                'nama' => 'required|string|max:50'.$id,
                'ttl' => 'required|string|max:255',
                'status' => 'required|string|max:50',
                'hobi' => 'required|string|max:50',
            ]);
    
            $data =KeluargaModel::where('id','=', $id)->update($request->except(['_token', '_method', 'submit']));
            return redirect('keluarga')
                ->with('success', 'Keluarga Berhasil Diedit');
        }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KeluargaModel::where('id', '=', $id)->delete();
        return redirect('keluarga')
        ->with('success', 'Keluarga Berhasil Dihapus');
    }
}
