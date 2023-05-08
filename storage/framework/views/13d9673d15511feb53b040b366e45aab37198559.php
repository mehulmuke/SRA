<?php $__env->startSection('content'); ?>
<div class="tab-content">
    <div class="tab-pane active" id="details">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="info-text"> Welcome to Installation and Setup Wizard.</h2>
            </div>
            <div class="text-center">
                <a type="button" class="btn btn-next btn-fill btn-danger btn-wd" href="<?php echo e(url('installer/requirements')); ?>"> Check Requirements & Permissions  </a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('installer.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\sraservices\resources\views/installer/index.blade.php ENDPATH**/ ?>