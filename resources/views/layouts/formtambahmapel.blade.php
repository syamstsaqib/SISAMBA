<div class="col-md-4">
  <div class="form-floating">
    {!! Form::text('nama_mapel',null,['class' => 'form-control'.(($errors->has('nama_mapel'))?" border-danger":""), 'id'=>'validationTooltip03','placeholder'=>'Nama Mata pelajaran','autocomplete'=>'off']) !!}
    <label for="floatingName">Nama Mata pelajaran</label>
  </div>
</div>
<div class="col-md-4">
  <div class="form-floating">
    {!! Form::number('KKM',null,['class' => 'form-control'.(($errors->has('KKM'))?" border-danger":""), 'id'=>'KKM','placeholder'=>'Nilai KKM']) !!}
    <label for="KKM">Nilai KKM</label>
  </div>
</div>
  