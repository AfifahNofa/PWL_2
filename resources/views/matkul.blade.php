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
          <h3 class="card-title">TI-2A/03</h3>

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
          <a href="{{url('matkul/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>kode</th>
                <th>nama</th>
                <th>dosen</th>
                <th>sks</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              @if($mk->count() > 0)
                @foreach ($mk as $mt => $m)
                  <tr>
                    <td>{{++$mt}}</td>
                    <td>{{$m->kode}}</td>
                    <td>{{$m->nama}}</td>
                    <td>{{$m->dosen}}</td>
                    <td>{{$m->sks}}</td>
                    <td>
                      <!-- Bikin tombol edit dan delete -->
                      <div class="btn-group">
                        <a href="{{ url('/matkul/'. $m->id.'/edit') }}" class="btn btn-sm btn-warning mr-2">edit</a>
                        <form method="POST" action="{{ url('/matkul/'.$m->id) }}" >
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger mr-2">hapus</button>
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
          2141720103-Afifah Nofa Kurnia Rahmadani
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  @endsection

  