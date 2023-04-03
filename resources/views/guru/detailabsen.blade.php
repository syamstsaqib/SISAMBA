@extends('layouts.app')


@section('style')
  @include('layouts.style')

@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Detail Presensi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Detail Presensi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Presensi</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama</th>
                    <th scope="col" class="text-center">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                                 
                  <tr>
                    <td></td>
                    <td></td>
                    <td class="text-center text-white bg-success">
                    <td class="text-center text-white bg-info">
                    <td class="text-center text-white bg-secondary">               
                    <td class="text-center text-white bg-warning">
                    <td class="text-center text-white bg-danger">
                  
                     </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3">
                      <a href="/guru/absensi" class="btn btn-secondary">Kembali</a>

                    </td>
                  </tr>
                </tfoot>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
      </div>
    </section>
    
  
</main>
@endsection

@section('script')
    @include('layouts.script')
    <script>
      $('.hapus-absen').click(function () {
    let form = $(this).parent();
    Swal.fire({
        icon: 'question',
        title: 'Hapus absen?',
        text: 'Apa anda yakin akan menghapus Absen? ',
        showCancelButton:true,
        showConfirmButton:true,

    }).then((result)=>{
        if(result.isConfirmed){
            form.submit();
        }
    })  
})
    </script>
@endsection