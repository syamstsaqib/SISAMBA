

@extends('layouts.app')


@section('style')
  @include('layouts.style')
  <style>
    .foto-siswa{
      width: 100px;
      height: 100px;
    }
  </style>
@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Data Siswa</li>
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
              <h5 class="card-title">Data Siswa</h5>
              <a href="/admin/datasiswa/create" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Tambah Siswa</a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Foto</th>
                  <th scope="col">NISN</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kelas</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $dt)
                <tr>
                  <th scope="row">
                    <img src="{{asset('storage/foto_siswa/'.$dt->foto)}}" alt="" class="img-fluid foto-siswa">  
                  </th>
                  <td>{{$dt->nisn}}</td>
                  <td>{{$dt->user->nama ?? 'ini nama'}}</td>
                  <td>{{$dt->kelas->tingkat_kelas ?? ''}}</td> 
                  <!-- pakai ?? dan '' kalau panggil relasi dan tidak ketemu -->
                  <td>
                    <div class="d-flex justify-content-evenly">
                      <div data-bs-toggle="modal" data-bs-target="#detailsiswa-{{$dt->id}}">
                        <button class="btn btn-sm btn-secondary detail_siswa" data-id ="" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Siswa" ><i class="fas fa-info-circle"></i></button>

                      </div>
                      <a href="/admin/datasiswa/{{$dt->id}}/edit" class="text-white btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Siswa"><i class="fas fa-user-edit"></i></a>
                      {!! Form::open(['url' => '/admin/datasiswa/'.$dt->id, 'method' => 'delete']) !!}
                      <button type="button" class="btn btn-sm btn-danger hapus_siswa" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Siswa"><i class="fas fa-trash-alt"></i></button>
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
<!-- Modal -->
@foreach($data as $dt)
<section class="profile">
<div class="modal fade" id="detailsiswa-{{$dt->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{asset('storage/foto_siswa/'.$dt->foto)}}" alt="Profile" id="foto" class="rounded-circle">
            <h2 id="nama"></h2>
            <h5>Siswa</h5>
            
          </div>
        </div>
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>
                <div class="row">
                  <div class="col-lg-4 col-md-5 label ">NISN</div>
                  <div class="col-lg-8 col-md-7" id="nisn">{{$dt->nisn}}</div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-5 label ">Nama Lengkap</div>
                  <div class="col-lg-8 col-md-7" id="nama">{{$dt->user->nama ?? ''}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Kelas</div>
                  <div class="col-lg-8 col-md-7" id="kelas">{{$dt->kelas->tingkat_kelas ?? ''}}</div>
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
                  <div class="col-lg-4 col-md-5 label">Nama Wali</div>
                  <div class="col-lg-8 col-md-7" id="nama_wali">{{$dt->nama_wali}}</div>
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
    <script src="{{  asset('js/datasiswa.js') }}"></script>
@endsection