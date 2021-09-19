<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Result</div>
                <div class="panel-body table-responsive">
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
                            <?php foreach($result1 as $hsl): ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($hsl->nama); ?></td>
                                <td><?php echo e($hsl->aspek); ?></td>
                                <td><?php echo e($hsl->faktor); ?></td>
                                <td><?php echo e($hsl->skala); ?></td>
                            </tr>
                            <?php endforeach; ?>
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
                                <td>Nilai Selisih</td>
                                <td>Nilai Siswa</td>
                                <td>Hasil</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            <?php foreach($result as $hsl): ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($hsl->nama); ?></td>
                                <td><?php echo e($hsl->aspek); ?></td>
                                <td><?php echo e($hsl->faktor); ?></td>
                                <td><?php echo e($hsl->nilai); ?></td>
                                <td><?php echo e($hsl->nilai_sub); ?></td>
                                <td><?php echo e($hsl->hasil); ?></td>
                            </tr>
                            <?php endforeach; ?>
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
                            <?php foreach($result2 as $hsl2): ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($hsl2->nama); ?></td>
                                <td><?php echo e($hsl2->core); ?></td>
                                <td><?php echo e($hsl2->secondary); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><center><h4><b><br>Ranking<br><br></b></h1></center>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Rangking</td>
                                <td>Nama Siswa</td>
                                <td>Nilai Kapasitas Intelektual </td>
                                <td>Nilai Sikap</td>
                                <!-- <td>Nilai Perilaku</td> -->
                                <td>Hasil</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            <?php foreach($result3 as $hsl3): ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($hsl3->nama); ?></td>
                                <td><?php echo e($hsl3->Ni); ?></td>
                                <td><?php echo e($hsl3->Ns); ?></td>
                                <!-- <td><?php echo e($hsl3->Np); ?></td> -->
                                <td><?php echo e($hsl3->Hasil); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><br><br><br>
                    <!-- <div class="text-center">
                        <h4>Manager</h4>
                        <br><br><br>
                        <h4><u><?php echo e($managers->nama); ?></u></h4>
                        <h4><?php echo e($managers->nip); ?></h4>
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>