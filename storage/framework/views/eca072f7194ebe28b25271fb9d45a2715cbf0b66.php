 


<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::missingdocuments.missingdocumentslogs'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('admin::missingdocuments.missingdocumentslogs'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean(trans('admin::missingdocuments.missingdocumentslogs'))); ?></h4>
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
                                    <th data-sort><?php echo e(clean(trans('admin::missingdocuments.table.id'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::missingdocuments.table.hutsurveyid'))); ?></th>
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
                                            echo "<td><a href='#'>Upload </a></td>";
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

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices_working\Modules/Admin/Resources/views/missingdocuments/index.blade.php ENDPATH**/ ?>