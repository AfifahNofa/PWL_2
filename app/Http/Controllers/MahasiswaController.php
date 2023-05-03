<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use App\Models\kelas;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = MahasiswaModel::with('kelas')->get();
        $paginate = MahasiswaModel::orderBy('id', 'asc')->paginate(3);
        return view('mahasiswa', ['mahasiswa'=> $mahasiswa, 'paginate'=>$paginate])
                ->with('mhs', $mahasiswa);
    // $mahasiswa = MahasiswaModel::all();
    // return view('mahasiswa')
    //         ->with('mhs', $mahasiswa);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create_mahasiswa',['kelas'=>$kelas])
            ->with('url_form', route('mahasiswa.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'id' => 'required',
        ]);
        $mahasiswa = new MahasiswaModel;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jk = $request->get('jk');
        $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->hp = $request->get('hp');
        $mahasiswa->save();

        $kelas = new kelas;
        $kelas->id = $request->get('id');

        //fungsi eloquent untk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(MahasiswaModel $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = MahasiswaModel::find($id);
        return view('mahasiswa.create_mahasiswa')
                    ->with('mhs', $mahasiswa)
                    ->with('kelas', kelas::all())
                    ->with('url_form', url('/mahasiswa/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
                'nama' => 'required|string|max:50',
                'jk' => 'required|in:l,p',
                'tempat_lahir' => 'required|string|max:50',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string|max:255',
                'hp' => 'required|digits_between:6,15',
            ]);
    
            $data =MahasiswaModel::where('id','=', $id)->update($request->except(['_token', '_method', 'submit']));
            return redirect('mahasiswa')
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
        MahasiswaModel::where('id', '=', $id)->delete();
        return redirect('mahasiswa')
        ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}




