<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data Siswa</div>

                <div class="panel-body">
                    <?php echo e(Form::open(['route' => 'siswa.store'])); ?>

                        <div class="form-group<?php echo $errors->has('nis') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('nis', 'NIS*')); ?>

                            <?php echo e(Form::text('nis', null, ['class'=>'form-control', 'placeholder'=>'e.g 10119479', 'required', 'oninvalid' => 'this.setCustomValidity("NIS Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '8'])); ?>

                            <?php echo $errors->first('nis', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('nama') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('nama', 'Nama Siswa')); ?>

                            <?php echo e(Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '40'])); ?>

                            <?php echo $errors->first('nama', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('tempat_lahir') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('tempat_lahir', 'Tempat Lahir')); ?>

                            <?php echo e(Form::text('tempat_lahir', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Tempat Lahir', 'required', 'oninvalid' => 'this.setCustomValidity("Tempa Lahir Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15'])); ?>

                            <?php echo $errors->first('tempat_lahir', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('tgl_lahir') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('tgl_lahir','Tanggal Lahir' , ['class' => 'control-label'])); ?>

                            <!-- <div class="input-group date"> -->
                              <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                              <?php echo e(Form::date('tgl_lahir', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Tanggal Lahir', ''])); ?>

                            <!-- </div> -->
                            <?php echo $errors->first('tgl_lahir', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('kelamin') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('kelamin', 'Jenis Kelamin')); ?>

                            <?php echo e(Form::select('kelamin', array('Pria'=>'Pria', 'Wanita'=>'Wanita'), null, ['class'=>'form-control', 'placeholder'=>'Pilih Jenis Kelamin'])); ?>

                            <?php echo $errors->first('kelamin', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('agama') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('agama', 'Agama')); ?>

                            <?php echo e(Form::select('agama', array('Islam'=>'Islam', 'Kristen'=>'Kristen', 'Hindu'=>'Hindu', 'Budha'=>'Budha'), null, ['class'=>'form-control', 'placeholder'=>'Pilih Agama'])); ?>

                            <?php echo $errors->first('agama', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('phone') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('phone', 'No Telepon')); ?>

                            <?php echo e(Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'Masukkan No Telepon', 'required', 'oninvalid' => 'this.setCustomValidity("No HP Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '14'])); ?>

                            <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

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