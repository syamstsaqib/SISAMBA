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
      @if($guru->walikelas)
      <div class="col-lg-4">
        <div class="card text-center">
          <div class="card-body p-0 m-0">
            <a href="/guru/datasiswa/kelas/{{ $guru->walikelas->id }}"><h4 class="p-5 card-title">Kelas {{ $guru->walikelas->kelas }} - {{ $guru->walikelas->kode_kelas }}</h4></a>
          </div>
        </div>
      </div>
      @else
      <div class="col-lg-12">
        <div class="card text-center">
          <div class="card-body p-0 m-0">
            <h4 class="p-5 card-title">Anda Belum Menjadi Wali Kelas</h4>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
</main>
@endsection

@section('script')
    @include('layouts.script')
    <script src="{{  asset('js/datasiswa2.js') }}"></script>
@endsection