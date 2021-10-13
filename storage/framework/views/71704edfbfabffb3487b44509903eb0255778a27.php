<?php $__env->startSection('content'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="aspek"]').on('change', function() {
            // console.log('cek');
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
                        // console.log(data);
                        $('select[name="category"]').empty();
                        $('select[name="id_faktor"]').empty();
                        $('select[name="category"]').append('<option value="">--- Pilih Category ---</option>');
                        $.each(data, function(aspek, value) {
                            
                            $('select[name="category"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                    },error: function(data){
                        console.log(data);
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
                        console.log(data);
                        $('select[name="id_faktor"]').empty();
                        
                        $.each(data, function(aspek, value) {
                            $('select[name="id_faktor"]').append('<option value="'+ aspek +'">'+ value +'</option>');
                        });
                    },error: function(data){
                        console.log(data);
                    }
                });
            }else{
                $('select[name="id_faktor"]').empty();
            }
        });
    });
</script>
<div class="container" >
    <div class="row">
    <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <?php echo e(Form::button('Kembali', ['class'=>'btn btn-danger btn-xs', 'onClick'=>'history.back();'])); ?>  
                Tambah Data Nilai Siswa</div>
                <div class="panel-body">
                    <?php echo e(Form::open(['route' => 'nilai.store'])); ?>

                    <div class="form-group<?php echo $errors->has('nis') ? ' has-error' : ''; ?>" style="display:none">
                        <?php echo e(Form::label('karyawa', 'Nama Siswa')); ?>

                        <select name="nis" class="form-control" required="required">
                            <?php foreach($siswas as $siswa): ?>
                            <option value="<?php echo e($siswa->nis); ?>"><?php echo e($siswa->nama); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo $errors->first('nis', '<p class="help-block">:message</p>'); ?>

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
                    <div class="form-group<?php echo $errors->has('category') ? ' has-error' : ''; ?>">
                        <?php echo e(Form::label('category', 'Jenis Kategory')); ?>

                        <select name="category" id="category" class="form-control" required="required">
                          <option value="">--- Pilih Category ---</option>
                          
                        </select>
                        <?php echo $errors->first('category', '<p class="help-block">:message</p>'); ?>

                    </div>
                        <div class="form-group<?php echo $errors->has('id_faktor') ? ' has-error' : ''; ?>">
                            <?php echo e(Form::label('id_faktor', 'Sub Kriteria')); ?>

                            <select name="id_faktor" class="form-control" required="required"></select>
                            <?php echo $errors->first('id_faktor', '<p class="help-block">:message</p>'); ?>

                        </div>


                        <div class="form-group<?php echo $errors->has('nilai') ? ' has-error' : ''; ?>" style="display:none">
                            <?php echo e(Form::label('nilai', 'Nilai')); ?>

                            <?php echo e(Form::select('nilai', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'), null, ['class'=>'form-control', 'placeholder'=>'Pilih Nilai'])); ?>

                            <?php echo $errors->first('nilai', '<p class="help-block">:message</p>'); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::submit('Tambah', ['class'=>'btn btn-primary  btn-xs'])); ?>

                            <button type="reset" class="btn btn-danger btn-xs">Batal</button>
                            
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:10px">
            <div class="panel panel-default">
                <div class="panel-heading">Penilaian Siswa</div>

                <div class="panel-body table-responsive">
                    <?php if(Session::has('alert-success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>    <i class="icon fa fa-check"></i> Berhasil!</h4>
                            <?php echo e(Session::get('alert-success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(Form::open(array('route' => 'nilai.destroy'))); ?>

                    <?php echo e(Form::hidden('_method', 'delete')); ?>


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%" class="nosort">
                                    <?php echo e(Form::checkbox('checkAll')); ?>

                                </th>
                                <td width="1%">No</td>
                                <td>Nama Siswa</td>
                                <td>Jenis Kriteria</td>
                                <td>Sub Kriteria</td>
                                <td>Nilai</td>
                                <!-- <th class="nosort" width="1%">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            <?php foreach($nilais as $nilai): ?>
                            <tr>
                                <td>
                                    <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup" value="<?php echo e($nilai->id); ?>" />
                                </td>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($nilai->nama_siswa); ?></td>
                                <td><?php echo e($nilai->aspek); ?></td>
                                <td><?php echo e($nilai->faktor); ?></td>
                                <td><?php echo e($nilai->nilai); ?></td>
                                <!-- <td class="center" align="center">
                                    <?php /* Html::linkRoute('nilai.edit', '', array($nilai->id), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit')) */ ?>
                                </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="center">
                                    <?php echo e(Form::button('<i class="glyphicon glyphicon-remove"></i>', array('class'=>'btn btn-danger btn-xs btn-del', 'type'=>'submit'))); ?>

                                </td>
                                <td colspan="5"></td>
                                <!-- <td align="center">
                                    <?php /* Html::linkRoute('nilai.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus')) */ ?>
                                </td> -->
                            </tr>
                         </tfoot>
                    </table>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>