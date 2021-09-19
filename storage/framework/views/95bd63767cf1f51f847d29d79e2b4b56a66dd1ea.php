<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Data Nilai Siswa</div>
                <div class="panel-body table-responsive">
                    <?php echo e(Form::model($nilais, ['route'=>['nilai.update', $nilais->id], 'method'=>'PATCH'])); ?>

                    <div class="form-group<?php echo $errors->has('nis') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('nis','Nama Siswa' , ['class' => 'control-label'])); ?>

                        <select id="nis" class="form-control" name="nis" required="required">
                            <option selected="selected" value="<?php echo e($nilais->karyawan_id); ?>"><?php echo e($nilais->karyawan_name); ?></option>
                            <?php foreach($siswas as $siswa): ?>
                                <?php if ( ! ($siswa->nis === $nilais->karyawan_id)): ?>
                                    <option value=<?php echo e($siswa->nis); ?>><?php echo e($siswa->nama); ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    <?php echo $errors->first('nis', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group<?php echo $errors->has('aspek') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('aspek','Jenis Kriteria' , ['class' => 'control-label'])); ?>

                        <select id="aspek" class="form-control" name="aspek" required="required">
                            <option selected="selected" value="<?php echo e($nilais->aspek_id); ?>"><?php echo e($nilais->aspek_name); ?></option>
                            <?php foreach($aspeks as $aspek): ?>
                                <?php if ( ! ($aspek->id_aspek === $nilais->aspek_id)): ?>
                                    <option value=<?php echo e($aspek->id_aspek); ?>><?php echo e($aspek->aspek); ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?php echo $errors->first('aspek', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group<?php echo $errors->has('id_faktor') ? ' has-error' : ''; ?>">
                    <?php echo e(Form::label('id_faktor','Sub Kriteria' , ['class' => 'control-label'])); ?>

                        <select id="id_faktor" class="form-control" name="id_faktor" required="required">
                            <!-- <option selected="selected" value="<?php echo e($nilais->faktor_id); ?>"><?php echo e($nilais->faktor_name); ?></option> -->
                            <?php foreach($faktors as $faktor): ?>
                                <?php if($nilais->faktor_id == $faktor->id_faktor): ?>
                                    <option selected="selected" value="<?php echo e($nilais->faktor_id); ?>"><?php echo e($nilais->faktor_name); ?></option>
                                <?php else: ?>
                                    <option value=<?php echo e($faktor->id_faktor); ?>><?php echo e($faktor->faktor); ?></option>
                                
                              <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                      <?php echo $errors->first('id_faktor', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group<?php echo $errors->has('nilai') ? ' has-error' : ''; ?>">
                    <?php echo e(Form::label('nilai', 'Nilai')); ?>

                        <select name="nilai" class="form-control" required="required">
                            <?php if($nilais->nilai == '1'): ?>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">5</option>
                            <option value="5">5</option>
                        <?php elseif($nilais->nilai == '2'): ?>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="1">1</option>
                        <?php elseif($nilais->nilai == '3'): ?>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        <?php elseif($nilais->nilai == '4'): ?>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        <?php elseif($nilais->nilai == '5'): ?>
                            <option value="5">5</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        <?php endif; ?>
                        </select>
                    <?php echo $errors->first('nilai', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::submit('Ubah', ['class'=>'btn btn-primary btn-xs'])); ?>

                        <?php echo e(Form::button('Batal', ['class'=>'btn btn-danger btn-xs', 'onClick'=>'history.back();'])); ?>

                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#aspek").click(function(){
        // $('#aspek').on('change', function() {
            var aspekID = $(this).val();
            if(aspekID) {
                $.ajax({
                    url: '/nilai/edit/'+aspekID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="id_faktor"]').empty();
                        $.each(data, function(aspek, value) {
                            $('select[name="id_faktor"]').append('<option value="'+ aspek +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="id_faktor"]').empty();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>