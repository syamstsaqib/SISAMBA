@extends('layouts.app')


@section('style')
@include('layouts.style')
<style>
  .foto-guru {
    width: 100px;
    height: 100px;
  }
</style>
@endsection

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Guru</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active">Data Guru</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif
            <div class="d-flex justify-content-md-between p-2">
              <h5 class="card-title">Data Guru</h5>
              <a href="/admin/dataguru/create" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Tambah Guru</a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Foto</th>
                  <th scope="col">NIP</th>
                  <th scope="col">Nama Guru</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $dt)
                <tr>
                  <th scope="row">
                    <img src="{{asset('storage/foto_guru/'.$dt->foto)}}" alt="" class="img-fluid foto-guru">
                  </th>
                  <td>{{$dt->nip}}</td>
                  <td>{{$dt->user->nama ?? 'ini nama guru'}}</td>
                  <td>
                    <div class="d-flex justify-content-lg-evenly">
                      <div data-bs-toggle="modal" data-bs-target="#detailguru-{{$dt->id}}">
                        <button class="btn btn-sm btn-secondary detail_guru" data-id="" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Guru"><i class="fas fa-info-circle"></i></button>
                      </div>
                      <a href="/admin/dataguru/{{$dt->id}}/edit" class="text-white btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Guru"><i class="fas fa-user-edit"></i></a>
                      {!! Form::open(['url' => '/admin/dataguru/'.$dt->id , 'method' => 'delete']) !!}
                      <button type="button" class="btn btn-sm btn-danger hapus_guru" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Guru"><i class="fas fa-trash-alt"></i></button>
                      {!! Form::close() !!}
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- modal -->
@foreach($data as $dt)
<section class="profile">
  <div class="modal fade" id="detailguru-{{$dt->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Guru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{asset('storage/foto_guru/'.$dt->foto)}}" alt="Profile" id="foto" class="rounded-circle">
              <h2 id="nama"></h2>
              <h5>Guru</h5>

            </div>
          </div>
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-lg-4 col-md-5 label ">NIP</div>
                    <div class="col-lg-8 col-md-7" id="nisn">{{$dt->nip}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-5 label ">Nama Lengkap</div>
                    <div class="col-lg-8 col-md-7" id="nama">{{$dt->user->nama ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-5 label">TTL</div>
                    <div class="col-lg-8 col-md-7" id="TTL">{{$dt->tempat_lahir}}, {{$dt->tgl_lahir}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-5 label">Jenis Kelamin</div>
                    <div class="col-lg-8 col-md-7" id="J_kelamin">{{$dt->jenis_kelamin}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-5 label">Alamat</div>
                    <div class="col-lg-8 col-md-7" id="alamat">{{$dt->alamat}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4 col-md-5 label">Email</div>
                    <div class="col-lg-8 col-md-7" id="email">{{$dt->user->email ?? ''}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach
@endsection

@section('script')
@include('layouts.script')
<script src="{{ asset('js/dataguru.js') }}"></script>
@endsection