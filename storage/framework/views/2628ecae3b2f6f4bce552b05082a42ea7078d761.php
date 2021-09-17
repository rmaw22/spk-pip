<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Faktor</div>

                <div class="panel-body">
                    <?php echo e(Form::open(['route' => 'faktor.store'])); ?>

                    <div class="form-group<?php echo $errors->has('aspek') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('aspek', 'Jenis Aspek')); ?>

                        <?php echo e(Form::select('aspek', $aspeks, null,['class'=>'form-control', 'placeholder'=>'Pilih Jenis Aspek'])); ?>

                        <?php echo $errors->first('aspek', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group<?php echo $errors->has('faktor') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('faktor', 'Nama Faktor')); ?>

                        <?php echo e(Form::text('faktor', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Faktor', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Faktor Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15'])); ?>

                        <?php echo $errors->first('faktor', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group<?php echo $errors->has('nilai') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('nilai', 'Nilai')); ?>

                        <?php echo e(Form::select('nilai', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'), null, ['class'=>'form-control', 'placeholder'=>'Pilih Nilai'])); ?>

                        <?php echo $errors->first('nilai', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group<?php echo $errors->has('kelompok') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('kelompok', 'Kelompok')); ?>

                        <?php echo e(Form::select('kelompok', array('Core'=>'Core', 'Secondary'=>'Secondary'), null, ['class'=>'form-control', 'placeholer'=>'Pilih Kelompok'])); ?>

                        <?php echo $errors->first('kelompok', '<p class="help-block">:message</p>'); ?>

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