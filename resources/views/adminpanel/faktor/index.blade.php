@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Data Faktor</div>
                    <meta name="csrf-token" content="{{ csrf_token() }}">

                    <div class="panel-body table-responsive">
                        @if (Session::has('alert-success'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4> <i class="icon fa fa-check"></i> Berhasil!</h4>
                                {{ Session::get('alert-success') }}
                            </div>
                        @endif

                        {{-- {{ Form::open(array('route' => 'faktor.destroy')) }}
                    {{ Form::hidden('_method', 'delete') }} --}}

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%" class="nosort">
                                        {{ Form::checkbox('checkAll') }}
                                    </th>
                                    <td width="1%">No</td>
                                    <td>Sub Kriteria</td>
                                    <td>Jenis Kriteria</td>
                                    <td>Nilai</td>
                                    <td>Kelompok</td>
                                    <th class="nosort" width="1%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($faktors as $faktor)
                                    <tr id="faktor{{ $faktor->id_faktor }}">
                                        <td>
                                            <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup"
                                                value="{{ $faktor->id_faktor }}" />
                                        </td>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $faktor->faktor }}</td>
                                        <td>{{ $faktor->aspek }}</td>
                                        <td>{{ $faktor->nilai_sub }}</td>
                                        <td>{{ $faktor->kelompok }}</td>
                                        <td class="center" align="center">
                                            {{ Html::linkRoute('faktor.edit', '', [$faktor->id_faktor], ['class' => 'btn btn-xs btn-info glyphicon glyphicon-edit']) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td align="center">
                                        {{ Form::button('<i class="glyphicon glyphicon-remove"></i>', ['class' => 'btn btn-danger btn-xs btn-del', 'type' => 'button']) }}
                                    </td>
                                    <td colspan="5"></td>
                                    <td align="center">
                                        {{ Html::linkRoute('faktor.create', '', [], ['class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus']) }}
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
                            url: '{{ URL::route('faktor.destroy') }}',
                            data: {
                                'id': IDs
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Hapus Sub Kriteria',
                                    'Data sub kriteria berhasil di hapus!',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload()
                                    }
                                })
                                for (let i = 0; i < checkItem.length; i++) {
                                    const element = checkItem[i];
                                    $('#faktor' + element.value).remove();
                                }
                            }
                        })
                    }
                })
            } else {
                Swal.fire(
                    'Hapus sub kriteria?',
                    'Silahkan pilih data untuk menghapus!',
                    'question'
                )
            }
        })

    </script>
@endsection
