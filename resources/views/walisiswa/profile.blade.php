@extends('layouts.app')


@section('style')
@include('layouts.style')
@endsection

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset('storage/') }}" alt="{{ auth()->user()->name }}" class="rounded-circle">
            <h2>{{ auth()->user()->name }}</h2>
            <h3>Siswa</h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Change Photo</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profile Details</h5>
                <div class="row">
                  <div class="col-lg-4 col-md-5 label ">NISN</div>
                  <div class="col-lg-8 col-md-7" id="nomor_induk"></div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label ">Nama Lengkap</div>
                  <div class="col-lg-8 col-md-7" id="nama"></div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Kelas</div>
                  <div class="col-lg-8 col-md-7" id="kelas"></div>
                </div>


                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Tempat Lahir</div>
                  <div class="col-lg-8 col-md-7" id="tempat_lahir"></div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Tanggal Lahir</div>
                  <div class="col-lg-8 col-md-7" id="tgl_lahir"></div>
                </div>
                
                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Jenis Kelamin</div>
                  <div class="col-lg-8 col-md-7" id="jenis_kelamin"></div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Alamat</div>
                  <div class="col-lg-8 col-md-7" id="alamat"></div>
                </div>

                <div class="row">
                  <div class="col-lg-4 col-md-5 label">Email</div>
                  <div class="col-lg-8 col-md-7" id="email"></div>
                </div>


              </div>


              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                {!! Form::open(['url'=>'/walisiswa/editprofile/', 'method'=>'put','files' => true]) !!}
                <div class="row mb-3">
                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Siswa</label>
                  <div class="col-md-8 col-lg-9">
                    <img src="{{ asset('storage/'.auth()->user()->siswa) }}" alt="{{ auth()->user()->name }}" class="img-preview">
                    <div class="pt-2">
                      <input type="file" id="foto-profile" style="display:none;" name="foto" onchange="previewImage()">
                      <label for="foto-profile" class="btn btn-primary btn-sm">
                        <i class="bi bi-upload text-white"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                {!! Form::close() !!}
              </div>
              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="post" action="/walisiswa/changePassword">
                  @csrf
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="current_password" type="password" class="form-control" id="currentPassword" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="newPassword" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewpassword" class="col-md-4 col-lg-3 col-form-label" required>Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main>
@endsection

@section('script')
@include('layouts.script')
<script src="{{ asset('js/profilguru.js') }}"></script>

@error('current_password')
<script>
  Swal.fire(
    'Ubah Password Gagal',
    '{{ $errors->first("current_password") }}',
    'error'
  );
</script>
@enderror
@error('password')
<script>
  Swal.fire(
    'Ubah Password Gagal',
    '{{ $errors->first("password") }}',
    'error'
  );
</script>
@enderror
@if(session()->has('success'))
<script>
  Swal.fire(
    '{{ session("success") }}',
    '',
    'success'
  );
</script>
@endif
@endsection