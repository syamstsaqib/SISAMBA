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
    <a href="/guru/absensi/create" class="btn btn-primary mb-3">Tambah absen</a>
    <div class="row align-items-top">
      <div class="col-lg-6">
        <!-- Card with header and footer -->
        <div class="card">
          <div class="card-header text-center"></div>
          <div class="card-body">
            <h5 class="card-title">Pertemuan Ke - </h5>

            <ul>
              <li>Tanggal: </li>
              <li>Waktu: </li>
              <li>Kelas: </li>
              <li>Jurusan: </li>
              <li>Guru: </li>
            </ul>

          </div>
          <div class="card-footer d-flex justify-content-around">
            <a href="" class="btn btn-warning text-white">Edit Absen</a>
            <a href="" class="btn btn-secondary text-white">Detail Absen</a>
            <a href="" class="btn btn-warning text-white">Input Absen</a>
            <button type="button" class="btn btn-danger text-white hapus-absen">Hapus Absen</button>

          </div>
        </div><!-- End Card with header and footer -->

      </div>
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