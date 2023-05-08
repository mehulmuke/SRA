<?php $__env->startSection('content'); ?>
<div class="tab-content">
    <div class="tab-pane active" id="details">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="info-text">Please make sure the PHP extensions listed below are installed.</h4>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Extensions</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $requirement->phpExtensions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $pleased): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($label); ?></td>

                                    <td class="text-center">
                                        <i class="fa fa-<?php echo e($pleased ? 'check' : 'times'); ?>" aria-hidden="true"></i>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="col-sm-12">
                 <h4 class="info-text">Please make sure you have set the correct permissions for the directories listed below.</h4>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Directories</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $requirement->directoriesPermissions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $pleased): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($label); ?></td>

                                    <td class="text-center">
                                    <i class="fa fa-<?php echo e($pleased ? 'check' : 'times'); ?>" aria-hidden="true"></i>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($requirement->pleased()): ?>
<div class="wizard-footer">
    <div class="pull-right">
        <a href="<?php echo e(url('installer/configuration')); ?>" title="Environment Configuration" class="btn btn-next btn-fill btn-danger btn-wd">
            Next 
        </a>
    </div>
    <div class="clearfix"></div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\resources\views/installer/server-requirements.blade.php ENDPATH**/ ?>