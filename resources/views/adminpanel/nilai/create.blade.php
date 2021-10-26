@extends('layouts.app')

@section('content')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="aspek"]').on('change', function() {
            console.log('cek');
            var aspekID = $(this).val();
            if(aspekID) {
                $.ajax({
                    url: '/nilai/edit/'+aspekID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log('cek');
                        $('select[name="id_faktor"]').empty();
                        $.each(data, function(aspek, value) {
                            $('select[name="id_faktor"]').append('<option value="'+ aspek +'">'+ value +'</option>');
                        });
                    },error: function(data){
                        console.log(data);
                    }
                });
            }else{
                $('select[name="id_faktor"]').empty();
            }
        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data Nilai Siswa</div>
                <div class="panel-body">
                    {{ Form::open(['route' => 'nilai.store']) }}
                    <div class="form-group{!! $errors->has('nis') ? ' has-error' : '' !!}">
                        {{ Form::label('karyawa', 'Nama Siswa') }}
                        <select name="nis" class="form-control" required="required">
                            @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->nis }}">{{ $siswa->nama }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('nis', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('aspek') ? ' has-error' : '' !!}">
                        {{ Form::label('aspek', 'Jenis Kriteria') }}
                        <select name="aspek" class="form-control" required="required">
                          <option value="">--- Pilih Kriteria ---</option>
                            @foreach ($aspeks as $aspek => $value)
                            <option value="{{ $aspek }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('aspek', '<p class="help-block">:message</p>') !!}
                    </div>
                    
                        <div class="form-group{!! $errors->has('id_faktor') ? ' has-error' : '' !!}">
                            {{ Form::label('id_faktor', 'Sub Kriteria') }}
                            <select name="id_faktor" class="form-control" required="required"></select>
                            {!! $errors->first('id_faktor', '<p class="help-block">:message</p>') !!}
                        </div>


                        <div class="form-group{!! $errors->has('nilai') ? ' has-error' : '' !!}">
                            {{ Form::label('nilai', 'Nilai') }}
                            {{ Form::select('nilai', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'), null, ['class'=>'form-control', 'placeholder'=>'Pilih Nilai']) }}
                            {!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Tambah', ['class'=>'btn btn-primary  btn-xs']) }}
                            {{ Form::button('Batal', ['class'=>'btn btn-danger btn-xs', 'onClick'=>'history.back();']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
