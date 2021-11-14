@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Data Siswa</div>

                    <meta name="csrf-token" content="{{ csrf_token() }}">

                    <div class="panel-body table-responsive">

                        @if (Session::has('alert-success'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ Session::get('alert-success') }}
                            </div>
                        @endif

                        {{-- {{ Form::open(array('route' => 'siswa.destroy')) }} --}}
                        {{-- {{ Form::hidden('_method', 'delete') }} --}}

                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%" class="nosort">
                                        {{ Form::checkbox('checkAll') }}
                                    </th>
                                    <th width="1%">No. </th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>No Telepon</th>
                                    <th>Periode</th>
                                    <th class="nosort" width="1%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($siswas as $siswa)
                                    <tr id="siswa{{ $siswa->id }}">
                                        <td>
                                            <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup"
                                                value="{{ $siswa->id }}" />
                                        </td>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->tempat_lahir }}, {{ $siswa->tgl_lahir }}</td>
                                        <td>{{ $siswa->kelamin }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td>{{ $siswa->phone }}</td>
                                        <td>{{ $siswa->periode }}</td>
                                        <td class="center" align="center">
                                            {{ Html::linkRoute('siswa.edit', '', [$siswa->nis], ['class' => 'btn btn-xs btn-info glyphicon glyphicon-edit']) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td align="center" class="nosort">
                                        {{ Form::button('<i class="glyphicon glyphicon-remove"></i>', ['class' => 'btn btn-danger btn-xs btn-del', 'type' => 'button']) }}
                                    </td>
                                    <td class="this_one"></td>
                                    <td class="this_one"></td>
                                    <td class="this_one"></td>
                                    <td class="this_one"></td>
                                    <td class="this_one"></td>
                                    <td class="this_one"></td>
                                    <td class="this_one"></td>
                                    <td class="this_one"></td>
                                    <td align="center" class="nosort">
                                        {{ Html::linkRoute('siswa.create', '', [], ['class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus']) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- {{ Form::close() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).on('click', '.btn-del', function(e) {
            // body...
            let id = $(this).val();
            const checkItem = $('#checkItem:checked').serializeArray()
            const IDs = []
            for (let i = 0; i < checkItem.length; i++) {
                const element = checkItem[i];
                IDs.push(parseInt(element.value))
            }
            if (checkItem.length > 0) {
                Swal.fire({
                    title: 'Anda yakin ingin menghapus data?',
                    text: 'Data yang dihapus tidak bisa di kembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'delete',
                            url: '{{ URL::route('siswa.destroy') }}',
                            data: {
                                'id': IDs
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Hapus Siswa',
                                    'Data siswa berhasil di hapus!',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload()
                                    }
                                })
                                for (let i = 0; i < checkItem.length; i++) {
                                    const element = checkItem[i];
                                    $('#siswa' + element.value).remove();
                                }
                            }
                        })
                    }
                })
            } else {
                Swal.fire(
                    'Hapus siswa?',
                    'Silahkan pilih data untuk menghapus!',
                    'question'
                )
            }
        })

    </script>
@endsection
@section('js')

@endsection
