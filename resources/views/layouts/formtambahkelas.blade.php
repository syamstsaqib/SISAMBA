<div class="col-md-12">
  {!! Form::select('kelas',$kelas,null,['placeholder' => 'Pilih kelas..','class'=>"form-select js-example-basic-single1" , 'id'=>"Kelas"]) !!}
</div>
<div class="col-md-12">
  <div class="form-floating">
    {!! Form::text('kode_kelas',null,['class' => 'form-control', 'id'=>'validationTooltip03','placeholder'=>'Kode_kelas', "required"]) !!}
    <label for="floatingName">Kode Kelas</label>
  </div>
</div>
{{-- walikelas select --}}
<div class="col-md-12">
  {!! Form::select('walikelas',$walikelas,null,['placeholder' => 'Pilih walikelas..','class'=>"form-select js-example-basic-single1" , 'id'=>"walikelas"]) !!}
</div>