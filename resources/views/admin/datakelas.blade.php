@extends('layouts.app')


@section('style')
  @include('layouts.style')
@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Kelas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Data Kelas</li>
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
              <h5 class="card-title">Data Kelas</h5>
              <a href="/admin/datakelas/create" class="btn btn-primary"> 
                <i class="fas fa-plus-circle"></i>
                Tambah Kelas</a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Kelas</th>
                  <th scope="col">Jumlah siswa</th>
                  <th scope="col">Wali kelas</th>
                  <th scope="col" style="text-align: center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dtkelas as $dt)
                <tr>
                  <td>{{ $dt->kelas }} - {{ $dt->kode_kelas }}</td>
                  <td>{{ $dt->siswa->count() }}</td>
                  <td>{{ $dt->dataWalikelas->user->nama }}</td>
                  <td align="center">
                    <div class="d-flex justify-content-lg-evenly">
                      <button kelas-id="" data-bs-toggle="modal" data-bs-target="#editpengampu" class="btn btn-sm btn-warning text-white edit-wali"><i class="fas fa-user-edit"></i></button>
                      {{-- <a href="/admin/dataguru/{{$dt->id}}/edit" class="text-white btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Guru"></a> --}}
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
<!-- Modal -->
<div class="modal fade" id="editpengampu" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Walikelas</h5>
        <button type="button" class="btn-close tutup-form" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="form-wali">
        
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
    @include('layouts.script')
    <script src="{{ asset('js/datakelas.js') }}"></script>
@endsection