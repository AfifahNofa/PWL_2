@extends('layout.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
              <ul class="list-group list-group-flush">
                  <li class="list-group-item"></b> Nama    :</b> Afifah Nofa Kurnia Rahmadani</li>
                  <li class="list-group-item"></b> TTL     :</b> Jayapura, 07 November 2002</li>
                  <li class="list-group-item"></b> Prodi   : </b> D-IV Teknik Informatika</li>
                  <li class="list-group-item"></b> Jurusan : </b> Teknologi Informasi</li>
                  <li class="list-group-item"></b> Alamat  : </b> Malang</li>
                  <li class="list-group-item"></b> No.Hp   :</b> 085868961706</li>
                  <li class="list-group-item"></b> Agama  : </b> islam</li>
          
              </ul>
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

 