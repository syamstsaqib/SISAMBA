@extends('layouts.app')

@section('style')
  @include('layouts.style')
@endsection

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Data Mata Pelajaran</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Menu</a></li>
        <li class="breadcrumb-item active">Data Mapel</li>
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
              <h5 class="card-title">Data Mata pelajaran</h5>
              <a href="/admin/datamapel/create" class="btn btn-primary"> <i class="fas fa-user-plus"></i> Tambah Mapel</a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable" id="tbl-mapel">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Mata Pelajaran</th>
                  <th scope="col">Nilai KKM</th>
                  <th scope="col">Guru Pengampu</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dtMapel as $mapel)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $mapel->mapel }}</td>
                  <td>{{ $mapel->kkm }}</td>
                  <td>{{ $mapel->guru->user->nama }}</td>
                  <td>
                    <div class="d-flex justify-content-lg-evenly"> 
                      <button type="button" class="text-white btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editmapel-{{ $mapel->id }}" title="Edit Mapel"><i class="fas fa-user-edit"></i></button>
                      {!! Form::open(['url' => '/admin/datamapel/' . $mapel->id, 'method' => 'delete']) !!}
                      <button type="button" class="btn btn-sm btn-danger hapus-mapel" title="Hapus Mapel"><i class="fas fa-trash-alt"></i></button>
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

@foreach ($dtMapel as $mapel)
<!-- Modal -->
<div class="modal fade" id="editmapel-{{ $mapel->id }}" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Mapel</h5>
        <button type="button" class="btn-close tutup-form" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <form action="/admin/datamapel/{{ $mapel->id }}" method="post">
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="mapel" class="form-label">Mata Pelajaran</label>
            <input type="text" class="form-control" id="mapel" name="mapel" value="{{ $mapel->mapel }}" required>
          </div>
          <div class="mb-3">
            <label for="kkm" class="form-label">Nilai KKM</label>
            <input type="text" class="form-control" id="kkm" name="kkm" value="{{ $mapel->kkm }}" required>
          </div>
          <div class="mb-3">
            <label for="guru" class="form-label">Guru Pengampu</label>
            <select class="form-select" aria-label="Default select example" id="guru" name="guru" required>
              @foreach ($dtGuru as $guru)
              <option value="{{ $guru->id }}" @if ($guru->id == $mapel->guru_id) selected @endif>{{ $guru->user->nama }}</option>
              @endforeach
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary tutup-form" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

@endsection

@section('script')
    @include('layouts.script')
    {{-- <script src="{{ asset('js/datamapel.js') }}"></script> --}}
    <script>
      // open swal hapus mapel
      $('#tbl-mapel').on('click', '.hapus-mapel', function(e) {
        e.preventDefault();
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data yang dihapus tidak dapat dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Hapus',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            // submit form
            $(this).parent().submit();
          }
        })
      });
    </script>
@endsection