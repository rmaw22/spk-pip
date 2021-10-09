<?php $__env->startSection('content'); ?>
<div class="container" >
    <div class="row">
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
                                <td>Nomor Induk Siswa</td>
                                <td>Nama Siswa</td>
                                <td>Tahun Periode</td>
                                <td>Status Penilaian</td>
                                <th class="nosort" width="1%">Action</th>
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
                                <td><?php echo e($nilai->nis); ?></td>
                                <td><?php echo e($nilai->nama_siswa); ?></td>
                                <td><?php echo e($nilai->periode); ?></td>
                                <td><?php echo ($nilai->status_penilaian == 0) ? '<span class="text-danger">Not Completed </span>':'<span class="text-info">Completed</span>'; ?></td>
                                <td class="center" align="center">
                                    <?php echo e(Html::linkRoute('nilai.detail', '', array($nilai->nis), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit'))); ?>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td align="center">
                                    <?php echo e(Form::button('<i class="glyphicon glyphicon-remove"></i>', array('class'=>'btn btn-danger btn-xs btn-del', 'type'=>'submit'))); ?>

                                </td>
                                <td align="center">
                                <?php echo e(Form::button('Mark As Completed', array('class'=>'btn btn-info btn-xs btn-del', 'type'=>'submit','disabled','id'=>'markComplete'))); ?>

                                </td>
                                <td colspan="4"></td>
                                <td align="center">
                                    <?php echo e(Html::linkRoute('nilai.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus'))); ?>

                                </td>
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
<?php $__env->startSection('js'); ?>
<script >
     $(document).ready(function() {
        $('input:checkbox').click(function() {
            if ($(this).is(':checked')) {
            $('#markComplete').prop("disabled", false);
            } else {
            if ($('.checkGroup').filter(':checked').length < 1){
            $('#markComplete').attr('disabled',true);}
            }
        });
        $("input[name='checkAll']").click(function() {
            if ($(this).is(':checked')) {
                $('#markComplete').prop("disabled", false);
            } else {
                if ($("input[name='checkAll']").filter(':checked').length < 1){
                $('#markComplete').attr('disabled',true);}
            }
        });
        $('#markComplete').click(function(e) {
            e.preventDefault();
            var myCheckboxes = new Array();
                $(".checkGroup").each(function() {
                myCheckboxes.push($(this).val());
                });
                console.log($("input[name='checkItem']"));
            $.ajax({
                url: "<?php echo e(route('siswa.completed')); ?>",
                dataType: "json",
                type: "GET",
                contentType: 'application/json; charset=utf-8',
                data: { listStudents: myCheckboxes},
                async: false,
                processData: false,
                cache: false,
                beforeSend:function(){
                    // return confirm("Are you sure?");
                },
                success: function (r) {
                   console.log(r);
                },
                error: function (xhr) {
                       console.log(xhr);
                }
            });  
        });     
        
     });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>