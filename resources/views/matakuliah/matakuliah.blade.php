@extends('layout.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mata Kuliah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mata Kuliah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">kelas : TI-2A</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <h3 class="text-center"><strong>Jurusan Teknologi Informasi Politeknik Negeri Malang</strong></h3>
          <a href="{{url('matakuliah/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Matkul</th>
                <th>SKS</th>
                <th>Jam</th>
                <th>Semester</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if($matkul->count() > 0)
                @foreach ($matkul as $mk => $mtkl)
                  <tr>
                    <td>{{++$mk}}</td>
                    <td>{{$mtkl->nama_matkul}}</td>
                    <td>{{$mtkl->sks}}</td>
                    <td>{{$mtkl->jam}}</td>
                    <td>{{$mtkl->semester}}</td>
                    <td>
                      <!-- Bikin tombol edit dan delete -->
                      <div class="card-body">
                        <a href="{{ route('matakuliah.edit', [$mtkl->id]) }}"class="btn btn-sm btn-warning">edit</a>
                        <a href="{{ route('matakuliah.show', [$mtkl->id]) }}" class="btn btn-sm btn-primary">show</a>
                        <form method="POST" action="{{ url('/matakuliah/'.$mtkl->id) }}" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                        </form>
                    </div>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
              @endif
            </tbody>
          </table>
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
  @endsection

  