 


<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('admin::sra.sralogs'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('admin::sra.sralogs'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean(trans('admin::sra.sralogs'))); ?></h4>
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
                                    <th data-sort><?php echo e(clean(trans('admin::sra.table.id'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.hutsurveyid'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.schemename'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.clusterid'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.hutownername'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.address'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.propertytype'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.floornum'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.hutlength'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.hutwidth'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.area'))); ?></th>
                                    <th><?php echo e(clean(trans('admin::sra.table.action'))); ?></th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($query as $key => $value) {
                                            # code...
                                            echo "<tr><td>".$i."</td>";
                                            echo "<td>".$value->HUTSURVERYID."</td>";
                                            echo "<td>".$value->SchemeName."</td>";
                                            echo "<td>".$value->ClusterId."</td>";
                                            echo "<td>".$value->HUTOWNERNAME."</td>";
                                            echo "<td>".$value->Address."</td>";
                                            echo "<td>".$value->PropertyType."</td>";
                                            echo "<td>".$value->FLOORNUM."</td>";
                                            echo "<td>".round($value->HUTLENGTH,2)."</td>";
                                            echo "<td>".round($value->HUTWIDTH,2)."</td>";
                                            echo "<td style='display: revert !important;'>".round($value->Area,2)."</td>";
                                            echo "<td><a href='http://localhost/sraservices_working/public/en/sra/elections/".$value->HUTSURVERYID."'>Election</a> | <a href='http://localhost/sraservices_working/public/en/sra/electricity/".$value->HUTSURVERYID."'>Electricity</a></td>";
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

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices_working\Modules/Admin/Resources/views/sra/index.blade.php ENDPATH**/ ?>