<?php $__env->startSection('content'); ?>
<div class="container" >
    <div class="row">
        <div class="col-md-12" style="margin-top:10px">
            <div class="panel panel-default">
                <div class="panel-heading">Penilaian Siswa</div>

                <div class="panel-body table-responsive">
                    <?php if(Session::has('alert-success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            <?php echo e(Session::get('alert-success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(Form::open(array('route' => 'nilai.destroy'))); ?>

                    <?php echo e(Form::hidden('_method', 'delete')); ?>


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%" class="nosort">
                                    <?php echo e(Form::checkbox('checkAll')); ?>

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
                            <?php foreach($nilais as $nilai): ?>
                            <tr>
                                <td>
                                    <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup" value="<?php echo e($nilai->id); ?>" />
                                </td>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($nilai->nis); ?></td>
                                <td><?php echo e($nilai->nama_siswa); ?></td>
                                <td><?php echo e($nilai->periode); ?></td>
                                <td><?php echo ($nilai->status_penilaian == 0) ? '<span class="text-danger">Not Completed </span>':'<span class="text-info">Completed</span>'; ?></td>
                                <td class="center" align="center">
                                    <?php echo e(Html::linkRoute('nilai.detail', '', array($nilai->nis), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit'))); ?>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="center">
                                    <?php echo e(Form::button('<i class="glyphicon glyphicon-remove"></i>', array('class'=>'btn btn-danger btn-xs btn-del', 'type'=>'submit'))); ?>

                                </td>
                                <td colspan="5"></td>
                                <td align="center">
                                    <?php echo e(Html::linkRoute('nilai.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus'))); ?>

                                </td>
                            </tr>
                         </tfoot>
                    </table>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>