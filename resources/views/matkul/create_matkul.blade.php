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
            <form method="POST" action="{{ $url_form}}">
                @csrf
                {!! (isset($mk))? method_field('PUT'): ''!!}
                <div class="form-group">
                    <label>Kode</label>
                    <input class="form-control @error('kode') is-invalid @enderror" value="{{ isset($mk)? $mk->kode :old('kode') }}" name="kode" type="text"/>
                    @error('kode')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($mk)? $mk->nama :old('nama') }}" name="nama" type="text"/>
                    @error('nama')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Dosen</label>
                    <input class="form-control @error('dosen') is-invalid @enderror" value="{{ isset($mk)? $mk->dosen :old('dosen') }}" name="dosen" type="text"/>
                    @error('dosen')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>SKS</label>
                    <input class="form-control @error('sks') is-invalid @enderror" value="{{ isset($mk)? $mk->sks :old('sks') }}" name="sks" type="text"/>
                    @error('sks')
                        <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="submit">
                </div>
            </form>
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

  