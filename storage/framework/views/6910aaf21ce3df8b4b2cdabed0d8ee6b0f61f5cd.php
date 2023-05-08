
<style type="text/css">
    th ,td{
        font-size:16px !important;
    }
</style>

<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-md-6">
            <?php $__env->startComponent('admin::include.page.header'); ?>
                <?php $__env->slot('title', clean(trans('Final Report'))); ?>
                <li class="nav-item">
                    <a href="#">
                        <?php echo e(clean(trans('Final Report'))); ?>

                    </a>
                </li>
            <?php echo $__env->renderComponent(); ?>
        </div>

    </div>

    <div class="table-responsive" id="sra-table">
        <table class="table table-hover table-striped table-responsive">
            <thead>
                
                <tr>
                    <th rowspan='2' style='text-align: center;'>Serial Number</th>
                    <!-- <th>Hut_id</th> -->
                    <th rowspan='2' style='text-align: center;'>Hut Owner Name</th>
                    <!-- <th>Address</th> -->
                    <th rowspan='2' style='text-align: center;'>Use <br> Residential/Commercial/Amenity/Construction/Religious Construction</th>
                    <th rowspan='2' style='text-align: center;'>Areas below residential/non-residential use</th>
                    <th rowspan='2' style='text-align: center;'>Documents Sumitted By Hut Owner</th> 
                 
                    <th colspan='2' style='text-align: center;'>Competent Authority's opinion on eligibility</th>
                </tr>
                <tr>
                    <th style='text-align: center;'>Eligible/Not Eligible/Undecided</th>
                    <th style='text-align: center;'>Final Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $sims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $sim->hutOwners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hutOwner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key + 1); ?></td>
                            
                            <td><?php echo e($sim->hutOwnerName); ?></td>
                            
                            <td><?php echo e($sim->Category); ?></td>
                            <td><?php echo e($sim->Area); ?></td>
                            
                            <td>
                                <?php if($sim->electricity_status == 1): ?>
                                    Electricity <br>
                                <?php endif; ?>
                                <?php if($sim->election_status == 1): ?>
                                    Election <br>
                                <?php endif; ?>
                                <?php if($sim->gumasta_status == 1): ?>
                                    Gumasta <br>
                                <?php endif; ?>
                                <?php if($sim->photopass_status == 1): ?>
                                    Photopass <br>
                                <?php endif; ?>
                                <?php if($sim->agreement_status == 1): ?>
                                    Registration Agreement <br>
                                <?php endif; ?>
                                <?php if($sim->adhar_status == 1): ?>
                                    Adhar Card <br>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($hutOwner->overall_status == 1): ?>
                                    <span style="color: green;">Eligible</span>
                                <?php elseif($hutOwner->overall_status == 2): ?>
                                    <span style="color: red;">Not Eligible</span>
                                <?php else: ?>
                                    <span style="color: orange;">Undecided</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($hutOwner->overall_remark); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>           
        </table>
    </div>

    
<?php $__env->stopSection(); ?>
    
    
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/sra/viewreport.blade.php ENDPATH**/ ?>