@extends('layouts.app')


@section('style')
@include('layouts.style')

@endsection

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                <li class="breadcrumb-item active">Data Nilai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Nilai </h5>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <label for="floatingName">Tugas 1</label>
                            </div>
                            <span class="text-danger" style="display: none">Nilai Tidak boleh lebih dari 100</span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <label for="floatingName">Tugas 2</label>
                            </div>
                            <span class="text-danger" style="display: none">Nilai Tidak boleh lebih dari 100</span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <label for="floatingName">Tugas 3</label>
                            </div>
                            <span class="text-danger" style="display: none">Nilai Tidak boleh lebih dari 100</span>

                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <label for="floatingName">Tugas 4</label>
                            </div>
                            <span class="text-danger" style="display: none">Nilai Tidak boleh lebih dari 100</span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <label for="floatingName">Tugas 5</label>
                            </div>
                            <span class="text-danger" style="display: none">Nilai Tidak boleh lebih dari 100</span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <label for="floatingName">UTS</label>
                            </div>
                            <span class="text-danger" style="display: none">Nilai Tidak boleh lebih dari 100</span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <label for="floatingName">UAS</label>
                            </div>
                            <span class="text-danger" style="display: none">Nilai Tidak boleh lebih dari 100</span>
                        </div>
                        <div class="text-left">
                            <button type="button" id="submit-btn" class="btn btn-primary">Submit</button>
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
<script src="{{ asset('js/inputnilai.js') }}"></script>
@endsection