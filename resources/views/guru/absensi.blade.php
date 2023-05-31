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
      @if($guru->walikelas)
      <div class="col-lg-4">
        <div class="card text-center">
          <div class="card-body p-0 m-0">
            <a href="/guru/absensi/kelas/{{ $guru->walikelas->id }}"><h4 class="p-5 card-title">Kelas {{ $guru->walikelas->kelas }} - {{ $guru->walikelas->kode_kelas }}</h4></a>
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
<script>
  $('.hapus-absen').click(function() {
    let form = $(this).parent();
    Swal.fire({
      icon: 'question',
      title: 'Hapus absen?',
      text: 'Apa anda yakin akan menghapus Absen? ',
      showCancelButton: true,
      showConfirmButton: true,

    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    })
  })
</script>
@endsection