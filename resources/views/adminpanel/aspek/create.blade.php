@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Data Aspek</div>
                    @if (Session::has('alert-danger'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4> <i class="icon fa fa-check"></i> Gagal!</h4>
                            {{ Session::get('alert-danger') }}
                        </div>
                    @endif

                    <div class="panel-body">
                        {{ Form::open(['route' => 'aspek.store']) }}
                        <div class="form-group{!! $errors->has('aspek') ? ' has-error' : '' !!}">
                            {{ Form::label('aspek', 'Nama Aspek') }}
                            {{ Form::text('aspek', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nama Aspek', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Aspek Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15']) }}
                            {!! $errors->first('aspek', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group{!! $errors->has('prosentase') ? ' has-error' : '' !!}">
                            {{ Form::label('prosentase', 'Nilai Prosentase') }}
                            {{ Form::text('prosentase', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Nilai Prosentase', 'required', 'oninvalid' => 'this.setCustomValidity("Nilai Prosentase Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '60']) }}
                            {!! $errors->first('prosentase', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Simpan', ['class' => 'btn btn-primary  btn-xs']) }}
                            {{ Form::button('Batal', ['class' => 'btn btn-danger btn-xs', 'onClick' => 'history.back();']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
