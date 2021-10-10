@extends('layouts.app')
@section('css')
<style>
    #table-ranking td{
        padding:10px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Result</div>
                <div class="panel-body table-responsive">
                {{ Form::open(['route' => 'hasil.search','method'=>'GET']) }}
                      
                        <div class="form-group{!! $errors->has('periode') ? ' has-error' : '' !!}">
                            {{ Form::label('periode', 'Tahun Periode') }}
                            <!-- <div class="input-group date"> -->
                            <!-- <span class="input-group-addon glyphicon glyphicon-calendar"></span> -->
                                {{ Form::selectYear('periode', $get_tahun[0]->year_start, $get_tahun[0]->year_end,  date('Y'),['class' => 'form-control', '']) }}
                              
                            <!-- </div> -->
                            {!! $errors->first('periode', '<p class="help-block">:message</p>') !!}
                        </div>
                        
                        <div class="form-group">
                            {{ Form::submit('Cari', ['class'=>'btn btn-primary  btn-xs']) }}
                        </div>
                    {{ Form::close() }}
                    <hr/>
                    <!-- <center><h4><b><br>Skala<br><br></b></h1></center>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td width="1%">No</td>
                                <td>NIS</td>
                                <td>Jenis Kriteria</td>
                                <td>Sub Kriteria</td>
                                <td>Skala</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($result1 as $hsl)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hsl->nama }}</td>
                                <td>{{ $hsl->aspek }}</td>
                                <td>{{ $hsl->faktor }}</td>
                                <td>{{ $hsl->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> -->
                    <center><h4><b><br>Hasil<br><br></b></h1></center>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Siswa</td>
                                <td>Jenis Kriteria</td>
                                <td>Sub Kriteria</td>
                                <td>Nilai Siswa</td>
                                <td>Nilai Ideal</td>
                                <td>Nilai Gap</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($result as $hsl)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hsl->nama }}</td>
                                <td>{{ $hsl->aspek }}</td>
                                <td>{{ $hsl->faktor }}</td>
                                <td>{{ $hsl->nilai }}</td>
                                <td>{{ $hsl->nilai_ideal }}</td>
                                <td>{{ $hsl->hasil }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><center><h4><b><br>Nilai Bobot<br><br></b></h1></center>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Siswa</td>
                                <td>Jenis Aspek</td>
                                <td>Nama Faktor</td>
                                <td>Nilai Bobot</td>
                                <td>Nilai Gap</td>
                                <td>Kelompok</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($result as $hsl1)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hsl1->nama }}</td>
                                <td>{{ $hsl1->aspek }}</td>
                                <td>{{ $hsl1->faktor }}</td>
                                <td>{{ $hsl1->bobot }}</td>
                                <td>{{ $hsl1->hasil }}</td>
                                <td>{{ $hsl1->kelompok}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><center><h4><b><br>Nilai Core Secondary<br><br></b></h1></center>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Siswa</td>
                                <td>Nilai Core</td>
                                <td>Nilai Secondary</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($result2 as $hsl2)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hsl2->nama }}</td>
                                <td>{{ $hsl2->core }}</td>
                                <td>{{ $hsl2->secondary }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <center><h4><b><br>Nilai Total<br><br></b></h1></center>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Siswa</td>
                                <td>Kriteria </td>
                                <td>NCF</td>
                                <td>NSF</td>
                                <td>NK</td>
                                <td>NS</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($Nilai_total as $total)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $total->nama }}</td>
                                <td>{{ $total->aspek }}</td>
                                <td>{{ $total->NCF }}</td>
                                <td>{{ $total->NSF }}</td>
                                <td>{{ ($total->N_K == NULL) ? '-' : $total->N_K }}</td>
                                <td>{{ ($total->N_S == NULL) ? '-' : $total->N_S }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    <center><h4><b><br>Ranking<br><br></b></h1></center>
                    <table class="table-bordered table-striped" id="table-ranking" width="100%" >
                        <thead>
                            <tr>
                                <td>Rangking</td>
                                <td>Nama Siswa</td>
                                <td>Nilai Kapasitas (NK)</td>
                                <td>Nilai Sikap (NS)</td>
                                <!-- <td>Nilai Perilaku</td> -->
                                <td>Nilai Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($result3 as $hsl3)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hsl3->nama }}</td>
                                <td>{{ $hsl3->Ni }}</td>
                                <td>{{ $hsl3->Ns }}</td>
                                <!-- <td>{{ $hsl3->Np }}</td> -->
                                <td>{{ $hsl3->Hasil }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><br><br><br>
                    <!-- <div class="text-center">
                        <h4>Manager</h4>
                        <br><br><br>
                        <h4><u>{{-- $managers->nama --}}</u></h4>
                        <h4>{{-- $managers->nip --}}</h4>
                    </div><br> -->
                    <div class="text-center">
                        <a href="{{ route('export.excel') }}">
                        <button class="btn btn-primary btn-xs">Download Excel</button>
                        </a>
                        <a href="#">
                        <button class="btn btn-default btn-xs">Download PDF</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
        $(function() {
        $('#table-ranking').dataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    text:'Download PDF Document',
                    extend: 'pdfHtml5',
                    title:'Ranking Siswa Berdasarkan Profile Matching',
                    download: 'open',
                    pageSize: 'A4',
                    alignment: "center",
                    customize: function (doc) {
                        doc.defaultStyle.fontSize = 11; //2, 3, 4,etc
                        doc.styles.tableHeader.alignment = 'center';
                        doc.styles.tableBodyEven.padding = [10, 10, 10, 10];
                        // doc.defaultStyle.alignment = 'center';
                           doc.styles.tableHeader.fontSize = 12; //2, 3, 4, etc
                           doc.content[1].table.widths = [ '15%',  '25%', '20%', '20%', 
                                                           '20%', '14%', '14%', '14%'];
                        //    doc.styles.td.padding = 10;
                          }
                }
            ],
            "order": [],
            "columnDefs": [ {
                "targets"  : 'nosort',
                "orderable": false,
            }]
        } );
        });
    </script>
@endsection
