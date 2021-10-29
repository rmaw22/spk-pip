<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="aspek"]').on('change', function() {
            console.log('cek');
            var aspekID = $(this).val();
            if(aspekID) {
                $.ajax({
                    url: '/nilai/getCategory/'+aspekID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        // console.log(data);
                        $('select[name="category"]').empty();
                        $.each(data, function(aspek, value) {
                            if (value.category === '<?php echo e($faktors->category); ?>') {
                                $('select[name="category"]').append('<option value="'+ value.category +'"  selected="selected">'+ value.category +'</option>');
                            }else{

                                $('select[name="category"]').append('<option value="'+ value.category +'">'+ value.category +'</option>');
                            }
                        });
                    },error: function(data){
                        console.log(data);
                    }
                });
            }else{
                $('select[name="category"]').empty();
            }
        });
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Data Faktor</div>

                <div class="panel-body">
                    <?php echo e(Form::model($faktors, ['route'=>['faktor.update', $faktors->id_faktor], 'method'=>'PATCH'])); ?>

                        <div class="form-group<?php echo $errors->has('aspek') ? ' has-error' : ''; ?>">
                          <?php echo e(Form::label('aspek','Jenis Aspek' , ['class' => 'control-label'])); ?>

                            <select id="aspek" class="form-control" name="aspek" required="required">
                              <option selected="selected" value="<?php echo e($faktors->aspekid); ?>"><?php echo e($faktors->aspek); ?></option>
                              <?php foreach($aspeks as $aspek): ?>
                                  <?php if ( ! ($aspek->id_aspek === $faktors->id_aspek)): ?>
                                    <option value=<?php echo e($aspek->id_aspek); ?>><?php echo e($aspek->aspek); ?></option>
                                  <?php endif; ?>
                              <?php endforeach; ?>
                            </select>
                            <?php echo $errors->first('aspek', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('category') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('category', 'Jenis Kategory')); ?>

                        <select name="category" id="category" class="form-control" required="required">
                        <option selected="selected" value="<?php echo e($faktors->category); ?>"><?php echo e($faktors->category); ?></option>
                              
                        </select>
                        <?php echo $errors->first('category', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('faktor') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('faktor', 'Nama Faktor')); ?>

                            <?php echo e(Form::text('faktor', null, ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Faktor', 'required', 'oninvalid' => 'this.setCustomValidity("Nama Faktor Harus Diisi")', 'onchange' => 'this.setCustomValidity("")', 'maxlength' => '15'])); ?>

                            <?php echo $errors->first('faktor', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('nilai') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('nilai', 'Nilai')); ?>

                            <select name="nilai" class="form-control" required="required">
                                <?php if($faktors->nilai_sub == 1): ?>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <?php elseif($faktors->nilai_sub == 2): ?>
                                <option value="2">2</option>
                                <option value="1">1</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <?php elseif($faktors->nilai_sub == 3): ?>
                                <option value="3">3</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <?php elseif($faktors->nilai_sub == 4): ?>
                                <option value="4">4</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <?php elseif($faktors->nilai_sub == 5): ?>
                                <option value="5">5</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <?php endif; ?>
                            </select>
                            <?php echo $errors->first('nilai', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group<?php echo $errors->has('kelompok') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('kelompok', 'Kelompok')); ?>

                            <select name="kelompok" class="form-control" required="required">
                              <?php if($faktors->kelompok == 'Core'): ?>
                              <option value="Core">Core</option>
                              <option value="Secondary">Secondary</option>
                              <?php else: ?>
                              <option value="Secondary">Secondary</option>
                              <option value="Core">Core</option>
                              <?php endif; ?>
                            </select>
                            <?php echo $errors->first('kelompok', '<p class="help-block">:message</p>'); ?>

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