<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Data Nilai Siswa</div>
                <div class="panel-body table-responsive">
                    <?php echo e(Form::model($nilais, ['route'=>['nilai.update', $nilais->id], 'method'=>'PATCH'])); ?>

                    <div class="form-group<?php echo $errors->has('nis') ? ' has-error' : ''; ?>" style="display:none">
                        <?php echo e(Form::label('nis','Nama Siswa' , ['class' => 'control-label'])); ?>

                        <select id="nis" class="form-control" name="nis" required="required">
                            <option selected="selected" value="<?php echo e($nilais->students_id); ?>"><?php echo e($nilais->students_name); ?></option>
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
                    <div class="form-group<?php echo $errors->has('category') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('category', 'Jenis Kategory')); ?>

                        <select name="category" id="category" class="form-control" required="required">
                          <option value="">--- Pilih Category ---</option>
                          
                        </select>
                        <?php echo $errors->first('category', '<p class="help-block">:message</p>'); ?>

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

                        <input type="number" name="nilai" id="nilai" value="<?php echo e($nilais->nilai); ?>" min=0 class="form-control">
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
            var nis = $('select[name="nis"]').val();
            if(aspekID) {
                $.ajax({
                    url: '/nilai/category/'+aspekID,
                    type: "GET",
                    dataType: "json",
                    data : {
                        nis_siswa : nis
                    },
                    success:function(data) {
                        $('select[name="category"]').empty();
                        $('select[name="category"]').append('<option value="">--- Pilih Category ---</option>');
                        $.each(data, function(aspek, value) {
                            
                            $('select[name="category"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="category"]').empty();
            }
        });
        $('select[name="category"]').on('change', function() {
            var CategoryID = $(this).val();
            console.log(CategoryID);
            var nis = $('select[name="nis"]').val();
            var aspek = $('select[name="aspek"]').find(":selected").val();
            if(aspek) {
                $.ajax({
                    url: '/nilai/edit/'+aspek,
                    type: "GET",
                    dataType: "json",
                    data : {
                        nis_siswa : nis,
                        category_faktor: CategoryID
                    },
                    success:function(data) {
                        if (data.length == 0) {
                            
                        }else{
                            $('select[name="id_faktor"]').empty();

                        }
                        
                        $.each(data, function(aspek, value) {
                            $('select[name="id_faktor"]').append('<option value="'+ aspek +'">'+ value +'</option>');
                        });
                    },error: function(data){
                        console.log(data);
                    }
                });
            }else{
                // $('select[name="id_faktor"]').empty();
            }
        });
        $("#id_faktor").click(function(){
            var fakID = $(this).val();
            if(fakID) {
                $.ajax({
                    url: '/nilai/getFaktorScore/'+fakID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                        $('#nilai').empty();
                        $('#nilai').val(data);
                    }
                });
            }else{
                $('#nilai').empty();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>