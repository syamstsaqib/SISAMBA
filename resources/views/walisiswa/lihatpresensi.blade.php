@extends('layouts.app')


@section('style')
  @include('layouts.style')
@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Lihat Presensi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Lihat Presensi</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section">
        <div class="row align-items-top">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Presensi</h5>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col" class="text-center">Hadir</th>
                            <th scope="col" class="text-center">Sakit</th>
                            <th scope="col" class="text-center">Izin</th>
                            <th scope="col" class="text-center">Terlambat</th>
                            <th scope="col" class="text-center">Alpa</th>
                        </tr>
                      </thead>
                      <tbody id="nilai-siswa">
                        <tr>
                          <td></td>
                          <td></td>
                          <td align="center"></td>
                          <td align="center"></td>
                          <td align="center"></td>
                          <td align="center"></td>
                          <td align="center"></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>  
            <div class="col-lg-12 justify-content-center">
              <h3 class="text-center">Riwayat Presensi</h3>
              
            </div> 


          
    
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
                
              </div><!-- End Card with header and footer -->
    
            </div>
            </div>
      </section>
      
</main>
@endsection

@section('script')
    @include('layouts.script')
@endsection