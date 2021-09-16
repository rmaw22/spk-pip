<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manager</div>

                <div class="panel-body table-responsive">
                    <?php if(Session::has('alert-success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            <?php echo e(Session::get('alert-success')); ?>

                        </div>
                    <?php endif; ?>
                    <div align="center">
                        <h3>Kepala Bidang</h3>
                        <br><br><br>
                        <h3><?php echo e($managers->nama); ?></h3>
                        <hr width="50%">
                        <h3>NIK : <?php echo e($managers->nip); ?></h3>
                    </div>
                    <a href="<?php echo e(route('manager.edit', $managers->id)); ?>" class="btn btn-info btn-xs pull-right">Ubah</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>