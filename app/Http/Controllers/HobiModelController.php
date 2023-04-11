<?php

namespace App\Http\Controllers;

use App\Models\HobiModel;
use Illuminate\Http\Request;

class HobiModelController extends Controller
{
    public function index(){
        $hobi = HobiModel::all();
        return view('hobi')
                ->with('hb', $hobi);
    }
 
    public function create()
    {
        return view('hobi.create_hobi')
            ->with('url_form', url('/hobi'));
    }
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama' => 'required|string|max:50',
            'hobi' => 'required|string|max:255',
        ]);

        $data =HobiModel::create($request->except(['_token']));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('hobi')
            ->with('success', 'Hobi Berhasil Ditambahkan');
    }

    public function show(HobiModel $hobi)
    {
        //
    }
   
    public function edit($id)
    {
        $hobi = HobiModel::find($id);
        return view('hobi.create_hobi')
            ->with('hb', $hobi)
            ->with('url_form', url('/hobi/'. $id));
    }
    public function update(Request $request, $id)
    {
            $request->validate([
                'nama' => 'required|string|max:50'.$id,
                'hobi' => 'required|string|max:255',
            ]);
    
            $data =HobiModel::where('id','=', $id)->update($request->except(['_token', '_method', 'submit']));
            return redirect('hobi')
                ->with('success', 'Mahasiswa Berhasil Diedit');
        }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HobiModel::where('id', '=', $id)->delete();
        return redirect('hobi')
        ->with('success', 'hobi Berhasil Dihapus');
    }
}

