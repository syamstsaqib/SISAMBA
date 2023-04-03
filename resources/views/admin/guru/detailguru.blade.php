@php
$nama_panggil = explode(" ",$guru->user->name);    
@endphp
<div class="card">
    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

      <img src="" alt="" id="foto" class="rounded-circle">
      <h2 id="nama_guru"></h2>
      <h5>Guru</h5>
      
    </div>
  </div>
  <div class="card">
    <div class="card-body pt-3">
      <!-- Bordered Tabs -->
      <div class="tab-content pt-2">

        <div class="tab-pane fade show active profile-overview" id="profile-overview">
          <h5 class="card-title">Profile Details</h5>
          <!-- ada if -->
          <div class="row">
            <div class="col-lg-4 col-md-5 label ">Wali Kelas</div>
            <div class="col-lg-8 col-md-7" id="walikelas"></div>
          </div>
          <!-- disini endif -->
          <div class="row">
            <div class="col-lg-4 col-md-5 label ">NIP</div>
            <div class="col-lg-8 col-md-7" id="NIP"></div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-5 label ">Nama Lengkap</div>
            <div class="col-lg-8 col-md-7" id="nama_lengkap"></div>
          </div>
          <!-- ini if guru mapel -->
          <div class="row">
            <div class="col-lg-4 col-md-5 label">Pengampu Mapel</div>
            <div class="col-lg-8 col-md-7" id="pengampu">
              
            </div>
          </div>
          <!-- ini endif -->

          <div class="row">
            <div class="col-lg-4 col-md-5 label">Tempat/Tanggal Lahir</div>
            <div class="col-lg-8 col-md-7" id="TTL"></div>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-5 label">Jenis Kelamin</div>
            <div class="col-lg-8 col-md-7" id="J_kelamin"></div>
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
      </div>
    </div>
  </div>