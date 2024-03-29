<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\MahasiswaMatakuliah;
use Illuminate\Support\Facades\Storage;
use PDF;
// use DataTables;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class MahasiswaController extends Controller
{
    public function index(){
        return view('mahasiswa');
        // $mahasiswa = MahasiswaModel::with('kelas')->get();
        // $paginate = MahasiswaModel::orderBy('id', 'asc')->paginate(3);
        // return view('mahasiswa', ['mhs'=> $mahasiswa, 'paginate'=>$paginate]);
        // $mahasiswa = MahasiswaModel::all();
        // return view('mahasiswa')
        //         ->with('mhs', $mahasiswa);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {

        $data = MahasiswaModel::selectRaw('id, nim, nama, jk, tempat_lahir, tanggal_lahir, alamat, hp');

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
    public function create()
    {
        $kelas = kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create_mahasiswa',['kelas'=>$kelas, 'url_form' =>route('mahasiswa.store')]);
    }
   
    public function store(Request $request)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
    
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal ditambahkan. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = MahasiswaModel::create($request->all());
        return response()->json([
            'status' => ($mhs),
            'modal_close' => false,
            'message' => ($mhs)? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
            'data' => null
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //validasi
    //     $request->validate([
    //         'nim' => 'required|string|max:10|unique:mahasiswa,nim',
    //         'nama' => 'required|string|max:50',
    //         'jk' => 'required|in:l,p',
    //         'tempat_lahir' => 'required|string|max:50',
    //         'tanggal_lahir' => 'required|date',
    //         'alamat' => 'required|string|max:255',
    //         'hp' => 'required|digits_between:6,15',
    //         'kelas_id' => 'required',]);
    //     // Menyimpan foto jika ada
    //     $foto_name = null;
    //     if ($request->file('image')) {
    //         $foto = $request->file('image');
    //         $foto_name = time() . '_' . $foto->getClientOriginalName();
    //         $foto_name = $request->file('image')->store('images', 'public');
    //     }
    //     $mahasiswa = new MahasiswaModel;
    //     $mahasiswa->nim = $request->get('nim');
    //     $mahasiswa->nama = $request->get('nama');
    //     $mahasiswa->jk = $request->get('jk');
    //     $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
    //     $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
    //     $mahasiswa->alamat = $request->get('alamat');
    //     $mahasiswa->hp = $request->get('hp');
    //     $mahasiswa->foto = $foto_name;
    //     $mahasiswa->save();

    //     $kelas = new kelas;
    //     $kelas->id = $request->get('kelas_id');
    //     //fungsi eloquent untk menambah data dengan relasi belongsTo
    //     $mahasiswa->kelas()->associate($kelas);
    //     $mahasiswa->save();
    //     //jika data berhasil ditambahkan, akan kembali ke halaman utama
    //     return redirect('mahasiswa')
    //         ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = MahasiswaModel::with('kelas')->where('id', $id)->first();
        
        return view('mahasiswa.detail', ['mahasiswa'=> $mahasiswa]);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $mahasiswa = MahasiswaModel::with('kelas')->where('id', $id)->first();
        $kelas = kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.edit')
                    ->with('mhs', $mahasiswa)
                    ->with('kelas', $kelas)
                    ->with('url_form', url('/mahasiswa/'. $id));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $rule = [
    //         //'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
    //         'nim' => ['required', 'string', 'max:10', \Illuminate\Validation\Rule::unique('mahasiswa', 'nim')->ignore($id, 'id')],
    //         'nama' => 'required|string|max:50',
    //         'hp' => 'required|digits_between:6,15',
    //     ];
    
    public function update(Request $request, $id)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,' . $id,
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diedit. ' . $validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = MahasiswaModel::where('id', $id)->update($request->except('_token', '_method'));
        

        return response()->json([
            'status' => true,
            'modal_close' => false,
            'message' => ($mhs) ? 'Data berhasil diedit' : 'Data gagal diedit',
            'data' => null
        ]);
    }

    // public function update(Request $request, $id)
    // {
    //         $request->validate([
    //             'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
    //             'nama' => 'required|string|max:50',
    //             'jk' => 'required|in:l,p',
    //             'tempat_lahir' => 'required|string|max:50',
    //             'tanggal_lahir' => 'required|date',
    //             'alamat' => 'required|string|max:255',
    //             'hp' => 'required|digits_between:6,15',
    //         ]);
    //         $mahasiswa = MahasiswaModel::with('kelas')->where('id', $id)->first();
    //         $mahasiswa->nim = $request->get('nim');
    //         $mahasiswa->nama = $request->get('nama');
    //         $mahasiswa->jk = $request->get('jk');
    //         $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
    //         $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
    //         $mahasiswa->alamat = $request->get('alamat');
    //         $mahasiswa->hp = $request->get('hp');
    //         $foto_name = null;
    //         if ($mahasiswa->foto && file_exists(storage_path('app/public/'.$mahasiswa->foto))) {
    //         Storage::delete('public/'. $mahasiswa->foto);
    //         }
    //         $foto_name = $request->file('image')->store('images', 'public');
    //         $mahasiswa->foto = $foto_name;
            
    //         $mahasiswa->save();

    //         $kelas = new kelas;
    //         $kelas->id = $request->get('kelas');
    //         //fungsi eloquent untk menambah data dengan relasi belongsTo
    //         $mahasiswa->kelas()->associate($kelas);
    //         $mahasiswa->save();
    //         //jika data berhasil ditambahkan, akan kembali ke halaman utama
    
    //         return redirect()->route('mahasiswa.index')
    //             ->with('success', 'Mahasiswa Berhasil Diupdate');
    //     }
    
    

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

    public function cetak_pdf($id){
        $mhs = MahasiswaModel::find($id);
        $mahasiswamatakuliah = MahasiswaMatakuliah::with('mahasiswa', 'matakuliah')->where('mahasiswa_id',  $id)->get();

        $pdf = PDF::loadview('mahasiswa.nilai_pdf',['mhs'=>$mhs, 'mm'=>$mahasiswamatakuliah]);
        return $pdf->stream();

    }
}

