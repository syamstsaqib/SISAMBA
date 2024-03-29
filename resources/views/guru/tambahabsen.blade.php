@extends('layouts.app')


@section('style')
  @include('layouts.style')

@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Presensi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Data Presensi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah Absen</h5>
              <div class="row flex-column my-1">
                <form action="/guru/absensi" method="post">
                  @csrf
                <div class="d-flex col-6">
                  <label for="kelas" class="col-sm-5 col-form-label">Kelas </label>
                  <select name="kelas" id="kelas" class="form-control" required>
                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }} - {{ $kelas->kode_kelas }}</option>
                  </select>
                </div>
                <div class="d-flex col-6 my-1">
                  <label for="kelas" class="col-sm-5 col-form-label">Mata pelajaran </label>
                  <select name="mapel" id="mapel" class="form-control" required>
                    @foreach ($mapel as $mp)
                      <option value="{{ $mp->id }}">{{ $mp->mapel }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="d-flex col-6 my-1">
                  <label for="pertemuan" class="col-sm-5 col-form-label">Pertemuan Ke </label>
                    <input type="number" name="pertemuan" class="form-control" id="pertemuan" required>
                </div>
                <div class="d-flex col-6 my-1">
                  <label for="inputTime" class="col-sm-5 col-form-label">Waktu</label>
                  <input type="time" name="startTime" class="form-control" required> <h2 class="mx-2">-</h2><input type="time" name="endTime" required class="form-control">
                </div>
                <div class="d-flex col-6 my-1">
                  <label for="tgl" class="col-sm-5 col-form-label">Tanggal</label>
                  <input type="date" id="tgl" name="tgl" class="form-control" required>
                </div>
                  <div class="text-left">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  
</main>
@endsection

@section('script')
    @include('layouts.script')
    <script src="{{ asset('js/tambahabsen.js') }}"></script>
@endsection