@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Data Nilai Siswa</div>
                <div class="panel-body table-responsive">
                    {{ Form::model($nilais, ['route'=>['nilai.update', $nilais->id], 'method'=>'PATCH']) }}
                    <div class="form-group{!! $errors->has('nis') ? ' has-error' : '' !!}" style="display:none">
                        {{ Form::label('nis','Nama Siswa' , ['class' => 'control-label']) }}
                        <select id="nis" class="form-control" name="nis" required="required">
                            <option selected="selected" value="{{ $nilais->students_id }}">{{ $nilais->students_name }}</option>
                        </select>
                    {!! $errors->first('nis', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('aspek') ? ' has-error' : '' !!}">
                        {{ Form::label('aspek','Jenis Kriteria' , ['class' => 'control-label']) }}
                        <select id="aspek" class="form-control" name="aspek" required="required">
                            <option selected="selected" value="{{ $nilais->aspek_id }}">{{ $nilais->aspek_name }}</option>
                            @foreach($aspeks as $aspek)
                                @unless($aspek->id_aspek === $nilais->aspek_id)
                                    <option value={{ $aspek->id_aspek }}>{{ $aspek->aspek }}</option>
                                @endunless
                            @endforeach
                        </select>
                        {!! $errors->first('aspek', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('category') ? ' has-error' : '' !!}">
                        {{ Form::label('category', 'Jenis Kategory') }}
                        <select name="category" id="category" class="form-control" required="required">
                          <option value="">--- Pilih Category ---</option>
                          
                        </select>
                        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('id_faktor') ? ' has-error' : '' !!}">
                    {{ Form::label('id_faktor','Sub Kriteria' , ['class' => 'control-label']) }}
                        <select id="id_faktor" class="form-control" name="id_faktor" required="required">
                            <!-- <option selected="selected" value="{{ $nilais->faktor_id }}">{{ $nilais->faktor_name }}</option> -->
                            @foreach($faktors as $faktor)
                                @if($nilais->faktor_id == $faktor->id_faktor)
                                    <option selected="selected" value="{{ $nilais->faktor_id }}">{{ $nilais->faktor_name }}</option>
                                @else
                                    <option value={{ $faktor->id_faktor }}>{{ $faktor->faktor }}</option>
                                
                              @endif
                            @endforeach
                        </select>
                      {!! $errors->first('id_faktor', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group{!! $errors->has('nilai') ? ' has-error' : '' !!}">
                    {{ Form::label('nilai', 'Nilai') }}
                        <input type="number" name="nilai" id="nilai" value="{{$nilais->nilai}}" min=0 class="form-control">
                    {!! $errors->first('nilai', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Ubah', ['class'=>'btn btn-primary btn-xs']) }}
                        {{ Form::button('Batal', ['class'=>'btn btn-danger btn-xs', 'onClick'=>'history.back();']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#aspek").click(function(){
        // $('#aspek').on('change', function() {
            var aspekID = $(this).val();
            var nis = $('select[name="nis"]').val();
            if(aspekID) {
                $.ajax({
                    url: '/nilai/category/'+aspekID,
                    type: "GET",
                    dataType: "json",
                    data : {
                        nis_siswa : nis
                    },
                    success:function(data) {
                        $('select[name="category"]').empty();
                        $('select[name="category"]').append('<option value="">--- Pilih Category ---</option>');
                        $.each(data, function(aspek, value) {
                            
                            $('select[name="category"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="category"]').empty();
            }
        });
        $('select[name="category"]').on('change', function() {
            var CategoryID = $(this).val();
            console.log(CategoryID);
            var nis = $('select[name="nis"]').val();
            var aspek = $('select[name="aspek"]').find(":selected").val();
            if(aspek) {
                $.ajax({
                    url: '/nilai/edit/'+aspek,
                    type: "GET",
                    dataType: "json",
                    data : {
                        nis_siswa : nis,
                        category_faktor: CategoryID
                    },
                    success:function(data) {
                        if (data.length == 0) {
                            
                        }else{
                            $('select[name="id_faktor"]').empty();

                        }
                        
                        $.each(data, function(aspek, value) {
                            $('select[name="id_faktor"]').append('<option value="'+ aspek +'">'+ value +'</option>');
                        });
                    },error: function(data){
                        console.log(data);
                    }
                });
            }else{
                // $('select[name="id_faktor"]').empty();
            }
        });
        $("#id_faktor").click(function(){
            var fakID = $(this).val();
            if(fakID) {
                $.ajax({
                    url: '/nilai/getFaktorScore/'+fakID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                        $('#nilai').empty();
                        $('#nilai').val(data);
                    }
                });
            }else{
                $('#nilai').empty();
            }
        });
    });
</script>
@endsection
