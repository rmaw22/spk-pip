@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Siswa</div>

                <div class="panel-body table-responsive">

                    @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif

                    {{ Form::open(array('route' => 'siswa.destroy')) }}
                    {{ Form::hidden('_method', 'delete') }}

                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%" class="nosort">
                                        {{ Form::checkbox('checkAll') }}
                                    </th>
                                    <th width="1%">No. </th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>No Telepon</th>
                                    <th class="nosort" width="1%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $no=1; ?>
                                @foreach($siswas as $siswa)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup" value="{{ $siswa->nis }}" />
                                    </td>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->tempat_lahir }}</td>
                                    <td>{{ $siswa->tgl_lahir }}</td>
                                    <td>{{ $siswa->kelamin }}</td>
                                    <td>{{ $siswa->agama }}</td>
                                    <td>{{ $siswa->phone }}</td>
                                    <td class="center" align="center">
                                        {{ Html::linkRoute('siswa.edit', '', array($siswa->nis), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit')) }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td align="center">
                                        {{ Form::button('<i class="glyphicon glyphicon-remove"></i>', array('class'=>'btn btn-danger btn-xs btn-del', 'type'=>'submit')) }}
                                    </td>
                                    <td colspan="8"></td>
                                    <td align="center">
                                        {{ Html::linkRoute('siswa.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus')) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).on('click', 'btn-del', function (e) {
            // body...
            var id = $(this).val();
            if ($('.nis'+id).find('.checkItem').is(':checked')==false) {
                alert('Please')
                return false;
            }

            if (confirm('Sure')) {
                $.ajax({
                    type : 'post',
                    url  : '{{ url('siswa/deleteRecord') }}',
                    data : {'nis':id},
                    success:function (data) {
                        // body...
                        $('.nis'+id).remove();
                    }
                })
            }else{
                alert('Cancel')
            }
        })
    </script>
@endsection
