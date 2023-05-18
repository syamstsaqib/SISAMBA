<div class="col-md-4">
  <div class="form-floating">
    {!! Form::text('nama_mapel',null,['class' => 'form-control'.(($errors->has('nama_mapel'))?" border-danger":""), 'id'=>'validationTooltip03','placeholder'=>'Nama Mata pelajaran','autocomplete'=>'off', "required"]) !!}
    <label for="floatingName">Nama Mata pelajaran</label>
  </div>
</div>
<div class="col-md-4">
  <div class="form-floating">
    {!! Form::number('KKM',null,['class' => 'form-control'.(($errors->has('KKM'))?" border-danger":""), 'id'=>'KKM','placeholder'=>'Nilai KKM', "required"]) !!}
    <label for="KKM">Nilai KKM</label>
  </div>
</div>
{{-- select guru --}}
<div class="col-md-4">
  {!! Form::select('guru_id',$dtguru,null,['placeholder' => 'Pilih guru..','class'=>"form-control form-select h-100" , 'id'=>"guru_id", "required"]) !!}
</div>
  