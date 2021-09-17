<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Profile</div>

                <div class="panel-body">
                    <?php if(Session::has('alert-success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            <?php echo e(Session::get('alert-success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo Form::model($admins, ['url' => url('/settings/profile'), 'method' => 'post']); ?>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('name', 'Nama'); ?>

                            <?php echo Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Anda', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '25']); ?>

                            <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('email', 'Email'); ?>

                            <?php echo Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Email Anda', 'required', 'oninvalid' => 'this.setCustomValidity("Email Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '25']); ?>

                            <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::submit('Ubah', ['class'=>'btn btn-info']); ?>

                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>