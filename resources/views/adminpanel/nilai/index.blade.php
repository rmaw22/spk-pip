@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-12" style="margin-top:10px">
            <div class="panel panel-default">
                <div class="panel-heading">Penilaian Siswa</div>

                <div class="panel-body table-responsive">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif

                    {{ Form::open(array('route' => 'nilai.destroy')) }}
                    {{ Form::hidden('_method', 'delete') }}

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%" class="nosort">
                                    {{ Form::checkbox('checkAll') }}
                                </th>
                                <td width="1%">No</td>
                                <td>Nomor Induk Siswa</td>
                                <td>Nama Siswa</td>
                                <td>Tahun Periode</td>
                                <td>Status Penilaian</td>
                                <th class="nosort" width="1%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach($nilais as $nilai)
                            <tr>
                                <td>
                                    <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup" value="{{ $nilai->id }}" />
                                </td>
                                <td>{{ $no++ }}</td>
                                <td>{{ $nilai->nis }}</td>
                                <td>{{ $nilai->nama_siswa }}</td>
                                <td>{{ $nilai->periode}}</td>
                                <td>{!! ($nilai->status_penilaian == 0) ? '<span class="text-danger">Not Completed </span>':'<span class="text-info">Completed</span>' !!}</td>
                                <td class="center" align="center">
                                    {{ Html::linkRoute('nilai.detail', '', array($nilai->nis), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit')) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="center">
                                    {{ Form::button('<i class="glyphicon glyphicon-remove"></i>', array('class'=>'btn btn-danger btn-xs btn-del', 'type'=>'submit')) }}
                                </td>
                                <!-- <td align="center"> -->
                                {{-- Form::button('Mark As Completed', array('class'=>'btn btn-info btn-xs btn-del', 'type'=>'submit','disabled','id'=>'markComplete')) --}}
                                <!-- </td> -->
                                <td colspan="6"></td>
                                <!-- <td align="center">
                                    {{-- Html::linkRoute('nilai.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus')) --}}
                                </td> -->
                            </tr>
                         </tfoot>
                    </table>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script >
     $(document).ready(function() {
        $('input:checkbox').click(function() {
            if ($(this).is(':checked')) {
            $('#markComplete').prop("disabled", false);
            } else {
            if ($('.checkGroup').filter(':checked').length < 1){
            $('#markComplete').attr('disabled',true);}
            }
        });
        $("input[name='checkAll']").click(function() {
            if ($(this).is(':checked')) {
                $('#markComplete').prop("disabled", false);
            } else {
                if ($("input[name='checkAll']").filter(':checked').length < 1){
                $('#markComplete').attr('disabled',true);}
            }
        });
        $('#markComplete').click(function(e) {
            e.preventDefault();
           
            $.ajax({
                url: "{{route('siswa.completed')}}",
                dataType: "json",
                type: "GET",
                contentType: 'application/json; charset=utf-8',
                data: { listStudents: myCheckboxes},
                async: false,
                processData: false,
                cache: false,
                beforeSend:function(){
                    // return confirm("Are you sure?");
                },
                success: function (r) {
                   console.log(r);
                },
                error: function (xhr) {
                       console.log(xhr);
                }
            });  
        });     
        
     });
</script>
@endsection
