<?php $__env->startSection('title'); ?>
    <?php if(isset($subtitle)): ?>
        <?php echo e("{$subtitle} - {$title}"); ?>

    <?php else: ?>
        <?php echo e($title); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
<h4 class="page-title"><?php echo e($title); ?></h4>
<!-- <ul class="breadcrumbs">
    <li class="nav-home">
        <a href="#">
            <i class="flaticon-home"></i>
        </a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <?php echo e($slot); ?>

</ul> -->
<?php $__env->stopSection(); ?>
<?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/include/page/header.blade.php ENDPATH**/ ?>