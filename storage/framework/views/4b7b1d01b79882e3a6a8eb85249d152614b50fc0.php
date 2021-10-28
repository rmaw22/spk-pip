<?php $__env->startSection('css'); ?>
<style>
    #table-ranking td {
        padding: 10px;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Result</div>
                <div class="panel-body table-responsive">
                    <?php echo e(Form::open(['route' => 'hasil.search','method'=>'GET'])); ?>

                    <div class="form-group<?php echo $errors->has('periode') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('periode', 'Tahun Periode')); ?>

                        <!-- <div class="input-group date"> -->
                        <!-- <span class="input-group-addon glyphicon glyphicon-calendar"></span> -->
                        <?php /* Form::selectYear('periode', $get_tahun[0]->year_start, $get_tahun[0]->year_end,  date('Y'),['class' => 'form-control', '']) */ ?>
                        <input type="text" class="form-control allownumericwithoutdecimal" name="periode" id="datepicker" value="<?php echo e(date('Y')); ?>" />
                        <!-- </div> -->
                        <?php echo $errors->first('periode', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::submit('Cari', ['class'=>'btn btn-primary  btn-xs'])); ?>

                    </div>
                    <?php echo e(Form::close()); ?>

                    <hr />
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
                            <?php $no = 1; ?>
                            <?php foreach($result1 as $hsl): ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($hsl->nama); ?></td>
                                <td><?php echo e($hsl->aspek); ?></td>
                                <td><?php echo e($hsl->faktor); ?></td>
                                <td><?php echo e($hsl->nama); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> -->
                    <center>
                        <h4><b><br>Hasil<br><br></b></h1>
                    </center>
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
                            <?php $no = 1; ?>
                            <?php foreach($result as $hsl): ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($hsl->nama); ?></td>
                                <td><?php echo e($hsl->aspek); ?></td>
                                <td><?php echo e($hsl->faktor); ?></td>
                                <td><?php echo e($hsl->nilai); ?></td>
                                <td><?php echo e($hsl->nilai_ideal); ?></td>
                                <td><?php echo e($hsl->hasil); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <center>
                        <h4><b><br>Nilai Bobot<br><br></b></h1>
                    </center>
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
                            <?php $no = 1; ?>
                            <?php foreach($result as $hsl1): ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($hsl1->nama); ?></td>
                                <td><?php echo e($hsl1->aspek); ?></td>
                                <td><?php echo e($hsl1->faktor); ?></td>
                                <td><?php echo e($hsl1->bobot); ?></td>
                                <td><?php echo e($hsl1->hasil); ?></td>
                                <td><?php echo e($hsl1->kelompok); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <center>
                        <h4><b><br>Nilai Core Secondary<br><br></b></h1>
                    </center>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Siswa</td>
                                <td>Jenis Aspek</td>
                                <td>Nilai Core (NCF)</td>
                                <td>Nilai Secondary (NSF)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($result2 as $hsl2): ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($hsl2->nama); ?></td>
                                <td><?php echo e($hsl2->aspek); ?></td>
                                <td><?php echo e($hsl2->core); ?></td>
                                <td><?php echo e($hsl2->secondary); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <center>
                        <h4><b><br>Nilai Total<br><br></b></h1>
                    </center>
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
                            <?php $no = 1; ?>
                            <?php foreach($Nilai_total as $total): ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($total->nama); ?></td>
                                <td><?php echo e($total->aspek); ?></td>
                                <td><?php echo e($total->NCF); ?></td>
                                <td><?php echo e($total->NSF); ?></td>
                                <td><?php echo e(($total->N_K == NULL) ? '-' : $total->N_K); ?></td>
                                <td><?php echo e(($total->N_S == NULL) ? '-' : $total->N_S); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><br>
                    <center>
                        <h4><b><br>Ranking<br><br></b></h1>
                    </center>
                    <table class="table-bordered table-striped" id="table-ranking" width="100%">
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
                            <?php $no = 1; ?>
                            <?php foreach($nilai_rangking as $hsl3): ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($hsl3->nama); ?></td>
                                <td><?php echo e($hsl3->NK); ?></td>
                                <td><?php echo e($hsl3->NS); ?></td>
                                <!-- <td><?php /* $hsl3->Np */ ?></td> -->
                                <td><?php echo e($hsl3->Hasil); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><br><br><br>
                    <!-- <div class="text-center">
                        <h4>Manager</h4>
                        <br><br><br>
                        <h4><u><?php /* $managers->nama */ ?></u></h4>
                        <h4><?php /* $managers->nip */ ?></h4>
                    </div><br> -->
                    <div class="text-center">
                        <a href="<?php echo e(route('export.excel')); ?>">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
        $('#table-ranking').dataTable({
            dom: 'Bfrtip',
            buttons: [{
                text: 'Download PDF Document',
                extend: 'pdfHtml5',
                title: 'Ranking Siswa Berdasarkan Profile Matching',
                download: 'open',
                pageSize: 'A4',
                alignment: "center",
                customize: function(doc) {
                    doc.defaultStyle.fontSize = 11; //2, 3, 4,etc
                    doc.styles.tableHeader.alignment = 'center';
                    doc.styles.tableBodyEven.padding = [10, 10, 10, 10];
                    // doc.defaultStyle.alignment = 'center';
                    doc.styles.tableHeader.fontSize = 12; //2, 3, 4, etc
                    doc.content[1].table.widths = ['15%', '25%', '20%', '20%',
                        '20%', '14%', '14%', '14%'
                    ];
                }
            }],
            "order": [],
            "columnDefs": [{
                "targets": 'nosort',
                "orderable": false,
            }]
        });
        
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>