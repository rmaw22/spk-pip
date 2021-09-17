<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Data Siswa</div>

                <div class="panel-body">
                    <?php echo e(Form::model($siswas, ['route'=>['siswa.update', $siswas->nis], 'method'=>'PATCH'])); ?>   
                        <div class="form-group<?php echo $errors->has('nis') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('nis', 'NIS*')); ?>

                            <?php echo e(Form::text('nis', null, ['class'=>'form-control', 'placeholder'=>'Masukkan NIS', 'required', 'oninvalid' => 'this.setCustomValidity("NIS Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '8'])); ?>

                            <?php echo $errors->first('nis', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('nama') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('nama', 'Nama Siswa')); ?>

                            <?php echo e(Form::text('nama', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '40'])); ?>

                            <?php echo $errors->first('nama', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('tempat_lahir') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('tempat_lahir', 'Tempat Lahir')); ?>

                            <?php echo e(Form::text('tempat_lahir', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Tempat Lahir', 'required', 'oninvalid' => 'this.setCustomValidity("Tempat Lahir Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15'])); ?>

                            <?php echo $errors->first('tempat_lahir', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('tgl_lahir') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('tgl_lahir','Tanggal Lahir' , ['class' => 'control-label'])); ?>

                            <div class="input-group date">
                              <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                              <?php echo e(Form::date('tgl_lahir', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Tanggal Lahir', 'readonly'])); ?>

                            </div>
                            <?php echo $errors->first('tgl_lahir', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('kelamin') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('kelamin', 'Jenis Kelamin')); ?>

                            <select name="kelamin" class="form-control" required="required">
                                <?php if($siswas->kelamin == 'Pria'): ?>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                                <?php else: ?>
                                <option value="Wanita">Wanita</option>
                                <option value="Pria">Pria</option>
                                <?php endif; ?>
                            </select>
                            <?php echo $errors->first('kelamin', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('agama') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('agama', 'Agama')); ?>

                            <select name="agama" class="form-control" required="required">
                                <?php if($siswas->agama == 'Islam'): ?>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <?php elseif($siswas->agama == 'Kristen'): ?>
                                <option value="Kristen">Kristen</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <?php elseif($siswas->agama == 'Katolik'): ?>
                                <option value="Katolik">Katolik</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <?php elseif($siswas->agama == 'Hindu'): ?>
                                <option value="Hindu">Hindu</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                                <?php elseif($siswas->agama == 'Budha'): ?>
                                <option value="Budha">Budha</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <?php endif; ?>
                            </select>
                            <?php echo $errors->first('agama', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('phone') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('phone', 'No Telepon')); ?>

                            <?php echo e(Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'Masukkan No Telepon', 'required', 'oninvalid' => 'this.setCustomValidity("No. Telephone Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '14'])); ?>

                            <?php echo $errors->first('phone', '<p class="help-block">:message</p>'); ?>

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