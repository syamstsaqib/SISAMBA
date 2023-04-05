@extends('layouts.app')
@section('style')
  @include('layouts.style')
  <style>
    .foto-admin{
      width: 100px;
      height: 100px;
    }
  </style>
@endsection
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active">Data Admin</li>
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
              <h5 class="card-title">Data Admin</h5>
              <a href="/superadmin/dataadmin/create" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Tambah Admin</a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">NISN</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($admin as $adm)
                <tr>
                  <td>{{$adm->nomor_induk}}</td>
                  <td>{{$adm->nama}}</td>
                  <td>{{$adm->email}}</td>
                  <td>
                    <div class="d-flex justify-content-evenly">
                      <div data-bs-toggle="modal" data-bs-target="#detailadmin-{{$adm->id}}">
                        <button class="btn btn-sm btn-secondary detail_admin" data-id ="" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail Admin" ><i class="fas fa-info-circle"></i></button>
                      </div>
                      <a href="/superadmin/dataadmin/{{$adm->id}}/edit" class="text-white btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Admin"><i class="fas fa-user-edit"></i></a>
                      {!! Form::open(['url' => '/superadmin/dataadmin/'.$adm->id, 'method' => 'delete']) !!}
                      <button type="button" class="btn btn-sm btn-danger hapus_admin" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Admin"><i class="fas fa-trash-alt"></i></button>
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
@foreach($admin as $adm)
<section class="profile">
  <div class="modal fade" id="detailadmin-{{$adm->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail admin</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              {{-- <img src="{{asset('storage/foto_admin/'.$adm->foto)}}" alt="Profile" id="foto" class="rounded-circle" style="object-fit: cover" height="150" width="150"> --}}
              <h2 id="nama"></h2>
              <h5>Admin</h5>
            </div>
          </div>
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-lg-4 col-md-5 label ">Nomor Induk</div>
                    <div class="col-lg-8 col-md-7" id="nisn">{{$adm->nomor_induk}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-5 label ">Nama Lengkap</div>
                    <div class="col-lg-8 col-md-7" id="nama">{{$adm->nama}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-5 label">Email</div>
                    <div class="col-lg-8 col-md-7" id="email">{{$adm->email}}</div>
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
    <script src="{{  asset('js/dataadmin.js') }}"></script>
@endsection