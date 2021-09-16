<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="aspek"]').on('change', function() {
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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Data Nilai Siswa</div>
                <div class="panel-body">
                    <?php echo e(Form::open(['route' => 'nilai.store'])); ?>

                    <div class="form-group<?php echo $errors->has('id_karyawan') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('karyawa', 'Nama Siswa')); ?>

                        <select name="id_karyawan" class="form-control" required="required">
                            <?php foreach($karyawans as $karyawan): ?>
                            <option value="<?php echo e($karyawan->id_karyawan); ?>"><?php echo e($karyawan->nama); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo $errors->first('id_karyawan', '<p class="help-block">:message</p>'); ?>

                    </div>
                    <div class="form-group<?php echo $errors->has('aspek') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('aspek', 'Jenis Kriteria')); ?>

                        <select name="aspek" class="form-control" required="required">
                          <option value="">--- Pilih Kriteria ---</option>
                            <?php foreach($aspeks as $aspek => $value): ?>
                            <option value="<?php echo e($aspek); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo $errors->first('aspek', '<p class="help-block">:message</p>'); ?>

                    </div>
                        <div class="form-group<?php echo $errors->has('id_faktor') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('id_faktor', 'Sub Kriteria')); ?>

                            <select name="id_faktor" class="form-control" required="required"></select>
                            <?php echo $errors->first('id_faktor', '<p class="help-block">:message</p>'); ?>

                        </div>


                        <div class="form-group<?php echo $errors->has('nilai') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('nilai', 'Nilai')); ?>

                            <?php echo e(Form::select('nilai', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'), null, ['class'=>'form-control', 'placeholder'=>'Pilih Nilai'])); ?>

                            <?php echo $errors->first('nilai', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::submit('Tambah', ['class'=>'btn btn-primary  btn-xs'])); ?>

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