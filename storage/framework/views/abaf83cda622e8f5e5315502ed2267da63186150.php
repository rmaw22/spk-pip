<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Siswa</div>

                <div class="panel-body table-responsive">

                    <?php if(Session::has('alert-success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo e(Session::get('alert-success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(Form::open(array('route' => 'siswa.destroy'))); ?>

                    <?php echo e(Form::hidden('_method', 'delete')); ?>


                        <table id="example1" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%" class="nosort">
                                        <?php echo e(Form::checkbox('checkAll')); ?>

                                    </th>
                                    <th width="1%">No. </th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>No Telepon</th>
                                    <th>Periode</th>
                                    <th class="nosort" width="1%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $no=1; ?>
                                <?php foreach($siswas as $siswa): ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="checkItem" name="checkItem[]" class="checkGroup" value="<?php echo e($siswa->nis); ?>" />
                                    </td>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($siswa->nis); ?></td>
                                    <td><?php echo e($siswa->nama); ?></td>
                                    <td><?php echo e($siswa->tempat_lahir); ?>, <?php echo e($siswa->tgl_lahir); ?></td>
                                    <td><?php echo e($siswa->kelamin); ?></td>
                                    <td><?php echo e($siswa->agama); ?></td>
                                    <td><?php echo e($siswa->phone); ?></td>
                                    <td><?php echo e($siswa->periode); ?></td>
                                    <td class="center" align="center">
                                        <?php echo e(Html::linkRoute('siswa.edit', '', array($siswa->nis), array('class'=>'btn btn-xs btn-info glyphicon glyphicon-edit'))); ?>

                                    </td>
                                </tr>
                                <?php endforeach; ?>
                              
                            </tbody>

                            <tfoot>
                            <tr>
                                    <td align="center" class="nosort">
                                        <?php echo e(Form::button('<i class="glyphicon glyphicon-remove"></i>', array('class'=>'btn btn-danger btn-xs btn-del', 'type'=>'submit'))); ?>

                                    </td>
                                    <td  class="this_one" ></td>
                                    <td  class="this_one" ></td>
                                    <td  class="this_one" ></td>
                                    <td  class="this_one" ></td>
                                    <td  class="this_one" ></td>
                                    <td  class="this_one" ></td>
                                    <td  class="this_one" ></td>
                                    <td  class="this_one" ></td>
                                    <td align="center" class="nosort">
                                        <?php echo e(Html::linkRoute('siswa.create', '', array(), array('class' => 'btn btn-xs btn-primary glyphicon glyphicon-plus'))); ?>

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
    
    <script type="text/javascript">
    
        $(document).on('click', 'btn-del', function (e) {
            // body...
            var id = $(this).val();
            if ($('.nis'+id).find('.checkItem').is(':checked')==false) {
                alert('Please')
                return false;
            }

            if (confirm('Sure')) {
                $.ajax({
                    type : 'post',
                    url  : '<?php echo e(url('siswa/deleteRecord')); ?>',
                    data : {'nis':id},
                    success:function (data) {
                        // body...
                        $('.nis'+id).remove();
                    }
                })
            }else{
                alert('Cancel')
            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>