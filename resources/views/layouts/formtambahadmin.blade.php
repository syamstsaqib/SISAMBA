<div class="col-md-12">
  <div class="form-floating">
    {!! Form::number('nip',null,['class' => 'form-control', 'id'=>'nomor_induk','placeholder'=>'NIP', "required"]) !!}
    <label for="nomor_induk">NIP</label>
  </div>
</div>
<div class="col-md-12">
  <div class="form-floating">
    {!! Form::text('nama',null,['class' => 'form-control', 'id'=>'validationTooltip03','placeholder'=>'Nama Admin', 'required']) !!}
    <label for="floatingName">Nama Admin</label>
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