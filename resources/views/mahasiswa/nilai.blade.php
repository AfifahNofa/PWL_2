@extends('layout.template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="col-sm-12 text-center">
                    <h3>JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h3>
                    <BR>
                    <h2>KARTU HASIL STUDI (KHS)</h2>
                </div>
                <br> <br>
                <div class="card-header">
                    <div class="card-title">
                        <div> Nama : {{ $mhs->nama }} </div>
                        <div> NIM : {{ $mhs->nim }} </div>
                        <div> Kelas: {{ $mhs->kelas->nama_kelas }} </div>
                    </div>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($mm->count() > 0)
                            @foreach ($mm as $m)
                                <tr>
                                    <td>{{$m->matakuliah->nama_matkul}}</td>
                                    <td>{{$m->matakuliah->sks}}</td>
                                    <td>{{$m->matakuliah->semester}}</td>
                                    <td>{{$m->nilai}}</td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center">
                                    Data Tidak ada
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <a class="btn btn-success mt3" href="{{ route('mahasiswa.index') }}">Kembali</a>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection