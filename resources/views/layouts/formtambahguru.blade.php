<div class="col-md-12">
  <div class="form-floating">
    {!! Form::number('nip',null,['class' => 'form-control', 'id'=>'nomor_induk','placeholder'=>'NIP', "required"]) !!}
    <label for="nomor_induk">NIP</label>
  </div>

</div>
<div class="col-md-12">
  <div class="row mb-3">
    <label for="inputNumber" class="col-form-label">Foto Profil</label>
    <div class="col-sm-12">
      {!! Form::file('foto',['class'=>'form-control','id'=>'formFile']); !!}
      {{-- <input class="form-control" type="file" id="formFile"> --}}
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="form-floating">
    {!! Form::text('nama',null,['class' => 'form-control'.(($errors->has('nama'))?" border-danger":""), 'id'=>'validationTooltip03','placeholder'=>'Nama guru', "required"]) !!}
    <label for="floatingName">Nama guru</label>
  </div>
  @error('nama')
  <div class="invalid-feedback" style="display:block;">
    {{$errors->first('nama')}}
  </div>
  @enderror
</div>
<div class="col-md-8">
  <div class="form-floating">
    {!! Form::text('tempat_lahir',null,['class' => 'form-control'.(($errors->has('tempat_lahir'))?" border-danger":""), 'id'=>'floatingName','placeholder'=>'Tempat Lahir','autocomplete'=>'off', "required"]) !!}
    <label for="floatingName">Tempat Lahir</label>

  </div>
</div>
<div class="col-md-4">
  <div class="form-floating">
    {!! Form::date('tgl_lahir',null,['class' => 'form-control'.(($errors->has('tgl_lahir'))?" border-danger":""), 'id'=>'floatingName','placeholder'=>'Tanggal Lahir','autocomplete'=>'off', "required"]) !!}
    <label for="floatingName">Tanggal Lahir</label>
  </div>

</div>
<div class="col-md-6">
  <div class="d-flex justify-content-sm-between">
    <legend class="col-form-label pt-0" style="flex-basis: 200px;">Jenis Kelamin</legend>

    <div class="form-check">
      {!! Form::radio('jenis_kelamin','Laki-laki',null,['class'=>'form-check-input','id'=>'jenis_kelamin1', "required"]) !!}
      <label class="form-check-label" for="jenis_kelamin1">
        Laki-Laki
      </label>
    </div>
    <div class="form-check">
      {!! Form::radio('jenis_kelamin','Perempuan',null,['class'=>'form-check-input','id'=>'jenis_kelamin2', "required"]) !!}
      <label class="form-check-label" for="jenis_kelamin2">
        Perempuan
      </label>
    </div>
  </div>



</div>
<div class="col-12">
  <div class="form-floating">
    {!! Form::textarea('alamat',null,['class'=>'form-control'.(($errors->has('alamat'))?" border-danger":""),'id'=>'Alamat','placeholder'=>'Alamat','autocomplete'=>'off','style'=>"height: 70px;", "required"]) !!}
    <label for="Alamat">Alamat</label>
  </div>
</div>

<div class="col-md-6">
  <div class="form-floating">
    {!! Form::email('email',null,['class'=>'form-control'.(($errors->has('email'))?" border-danger":""),'id'=>'floatingEmail','placeholder'=>'Email','autocomplete'=>'off', "required"]) !!}
    <label for="floatingEmail">Email</label>
  </div>
</div>
<div class="col-md-6">
  <div class="form-floating">
    {!! Form::password('password',['class'=>'form-control'.(($errors->has('password'))?" border-danger":""),'id'=>'floatingPassword','placeholder'=>'Password']) !!}
    <label for="floatingPassword">Password</label>
  </div>


</div>