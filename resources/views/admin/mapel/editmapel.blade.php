@extends('layouts.app')


@section('style')

@include('layouts.style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Mata Pelajaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Menu</a></li>
          <li class="breadcrumb-item active">Edit Mapel</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
  
  <section class="section">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Mata pelajaran</h5>

                <div class="text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
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

@endsection