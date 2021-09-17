<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Data Aspek</div>

                <div class="panel-body">
                    <?php echo e(Form::model($aspeks, ['route'=>['aspek.update', $aspeks->id_aspek], 'method'=>'PATCH'])); ?>

                        <div class="form-group<?php echo $errors->has('aspek') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('aspek', 'Nama Aspek')); ?>

                            <?php echo e(Form::text('aspek', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Aspek', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Aspek Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15'])); ?>

                            <?php echo $errors->first('aspek', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('prosentase') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('prosentase', 'Nilai Prosentase')); ?>

                            <?php echo e(Form::text('prosentase', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nilai Prosentase', 'required', 'oninvalid' => 'this.setCustomValidity("Nilai Prosentase Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '40'])); ?>

                            <?php echo $errors->first('prosentase', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::submit('Ubah', ['class'=>'btn btn-primary  btn-xs'])); ?>

                            <?php echo e(Form::button('Batal', ['class'=>'btn btn-danger btn-xs', 'onClick'=>'history.back();'])); ?>

                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>