 


<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::missingelectiondocuments.missingelectiondocumentslogs'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('admin::missingelectiondocuments.missingelectiondocumentslogs'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean(trans('admin::missingelectiondocuments.missingelectiondocumentslogs'))); ?></h4>
                    </div>
                </div>
                <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>

                <div class="card-body">
                    <div class="table-responsive" id="sra-table">
                            <table class="table table-hover table-striped table-responsive text-nowrap">

                                <thead>
                                        <tr>
                                    <th data-sort><?php echo e(clean(trans('admin::missingelectiondocuments.table.id'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::missingelectiondocuments.table.hutsurveyid'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::missingelectiondocuments.table.cluster_id'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::missingelectiondocuments.table.owner_name'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::missingelectiondocuments.table.address'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::missingelectiondocuments.table.property_type'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::missingelectiondocuments.table.floor_num'))); ?></th>

                                    <th>Upload Status</th>
                                    <th>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($query as $key => $value) {
                                            # code...
                                            echo "<tr><td>".$i."</td>";
                                            echo "<td>".$value->hut_id."</td>";
                                            echo "<td>".$value->cluster_id."</td>";
                                            echo "<td>".$value->owner_name."</td>";
                                            echo "<td>".$value->address."</td>";
                                            echo "<td>".$value->property_type."</td>";
                                            echo "<td>".$value->floor_num."</td>";


                                            if($value->status == 0){
                                                echo "<td> <button class='btn btn-danger'><i class='fa fa-window-close'></i></button></td>";
                                            }else{
                                                echo "<td> <button class='btn btn-success'><i class='fa fa-check'></i></button></td>";
                                            }
                                            echo "<td><a href='http://localhost/sraservices_working/public/missingelectiondocuments/manualdata/".$value->hut_id."'>Upload </a></td>";

                                            // echo "<td>Electricity</td> </tr>";
                                            echo "</tr>";


                                            $i++;
                                        }
                                    ?>
                                </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>
    

<script>
    $(document).ready(function() {
      $('#sra-table .table').DataTable({
  "searching": true
});
  } );
   </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Admin/Resources/views/missingelectiondocuments/index.blade.php ENDPATH**/ ?>