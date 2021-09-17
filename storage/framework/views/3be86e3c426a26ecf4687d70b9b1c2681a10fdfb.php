<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data GAP</div>

                <div class="panel-body">
                    <?php echo e(Form::open(['route' => 'gap.store'])); ?>

                        <div class="form-group<?php echo $errors->has('selisih') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('selisih', 'Nilai Selisih ')); ?>

                            <?php echo e(Form::text('selisih', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nilai Selisih ', 'required', 'oninvalid' => 'this.setCustomValidity("Nilai Selisih Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '3'])); ?>

                            <?php echo $errors->first('selisih', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('bobot') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('bobot', 'Nilai GAP')); ?>

                            <?php echo e(Form::text('bobot', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nilai Gap', 'required', 'oninvalid' => 'this.setCustomValidity("Nilai GAP Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15'])); ?>

                            <?php echo $errors->first('bobot', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('keterangan') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('keterangan', 'Keterangan')); ?>

                            <?php echo e(Form::text('keterangan', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Keterangan', 'required', 'oninvalid' => 'this.setCustomValidity("Keterangan Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '255'])); ?>

                            <?php echo $errors->first('keterangan', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::submit('Simpan', ['class'=>'btn btn-primary  btn-xs'])); ?>

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