@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Data Siswa</div>

                <div class="panel-body">
                    {{ Form::model($siswas, ['route'=>['siswa.update', $siswas->nis], 'method'=>'PATCH']) }}   
                        <div class="form-group{!! $errors->has('nis') ? ' has-error' : '' !!}">
                            {{ Form::label('nis', 'NIS*') }}
                            {{ Form::text('nis', null, ['class'=>'form-control', 'placeholder'=>'Masukkan NIS', 'required', 'oninvalid' => 'this.setCustomValidity("NIS Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '8']) }}
                            {!! $errors->first('nis', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('periode') ? ' has-error' : '' !!}">
                            {{ Form::label('periode', 'Tahun Periode') }}
                            <!-- <div class="input-group date"> -->
                            <!-- <span class="input-group-addon glyphicon glyphicon-calendar"></span> -->
                                {{-- Form::selectYear('periode', date("Y", strtotime('-50 years')), date("Y", strtotime('+3 years')),  $siswas->periode,['class' => 'form-control', 'placeholder' => 'Masukkan Tahun Periode', '']) --}}
                                <input type="text" class="form-control allownumericwithoutdecimal" name="periode" id="datepicker" placeholder="Masukkan Tahun Periode" value="{{$siswas->periode}}"/>

                            <!-- </div> -->
                            {!! $errors->first('periode', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('nama') ? ' has-error' : '' !!}">
                            {{ Form::label('nama', 'Nama Siswa') }}
                            {{ Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '40']) }}
                            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('tempat_lahir') ? ' has-error' : '' !!}">
                            {{ Form::label('tempat_lahir', 'Tempat Lahir') }}
                            {{ Form::text('tempat_lahir', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Tempat Lahir', 'required', 'oninvalid' => 'this.setCustomValidity("Tempat Lahir Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15']) }}
                            {!! $errors->first('tempat_lahir', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('tgl_lahir') ? ' has-error' : '' !!}">
                            {{ Form::label('tgl_lahir','Tanggal Lahir' , ['class' => 'control-label']) }}
                            {{-- <div class="input-group date"> --}}
                            <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                            {{ Form::date('tgl_lahir', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Tanggal Lahir']) }}
                            {{-- </div> --}}
                            {!! $errors->first('tgl_lahir', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('kelamin') ? ' has-error' : '' !!}">
                            {{ Form::label('kelamin', 'Jenis Kelamin') }}
                            <select name="kelamin" class="form-control" required="required">
                                @if($siswas->kelamin == 'Pria')
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                                @else
                                <option value="Wanita">Wanita</option>
                                <option value="Pria">Pria</option>
                                @endif
                            </select>
                            {!! $errors->first('kelamin', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('agama') ? ' has-error' : '' !!}">
                            {{ Form::label('agama', 'Agama') }}
                            <select name="agama" class="form-control" required="required">
                                @if($siswas->agama == 'Islam')
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                @elseif($siswas->agama == 'Kristen')
                                <option value="Kristen">Kristen</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                @elseif($siswas->agama == 'Katolik')
                                <option value="Katolik">Katolik</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                @elseif($siswas->agama == 'Hindu')
                                <option value="Hindu">Hindu</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                                @elseif($siswas->agama == 'Budha')
                                <option value="Budha">Budha</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                @endif
                            </select>
                            {!! $errors->first('agama', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('phone') ? ' has-error' : '' !!}">
                            {{ Form::label('phone', 'No Telepon') }}
                            {{ Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'Masukkan No Telepon', 'required', 'oninvalid' => 'this.setCustomValidity("No. Telephone Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '14']) }}
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Ubah', ['class'=>'btn btn-primary  btn-xs']) }}
                            {{ Form::button('Batal', ['class'=>'btn btn-danger btn-xs', 'onClick'=>'history.back();']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    });
</script>
@endsection