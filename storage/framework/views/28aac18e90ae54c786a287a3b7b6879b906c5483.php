<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Password</div>
                <div class="panel-body">
                    <?php if(Session::has('alert-success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            <?php echo e(Session::get('alert-success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo Form::open(['url' => url('/settings/password'), 'method' => 'post']); ?>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('password', 'Password'); ?>

                            <?php echo Form::password('password', ['class'=>'form-control', 'placeholder' => 'Masukkan Password Sekarang']); ?>

                            <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo e($errors->has('new_password') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('new_password', 'New Password'); ?>

                            <?php echo Form::password('new_password', ['class'=>'form-control', 'placeholder' => 'Masukkan Password Baru']); ?>

                            <?php echo $errors->first('new_password', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo e($errors->has('new_password_confirmation') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('new_password_confirmation', 'Confirmation New Password'); ?>

                            <?php echo Form::password('new_password_confirmation', ['class'=>'form-control', 'placeholder' => 'Konfirmasi Password Baru']); ?>

                            <?php echo $errors->first('new_password_confirmation', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::submit('Update', ['class'=>'btn btn-info']); ?> 
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>