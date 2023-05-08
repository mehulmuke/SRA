<?php if(session()->has('success')): ?>
<div class="col-md-12">
    <div class="alert alert-success alert-dismissable clearfix">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fas fa-check" aria-hidden="true"></i> <?php echo e(clean(session('success'))); ?>

    </div>
</div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
<div class="col-md-12">
    <div class="alert alert-danger alert-dismissable clearfix">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fas fa-exclamation" aria-hidden="true"></i> <?php echo e(clean(session('error'))); ?>

    </div>
</div>
<?php endif; ?>
<?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/include/notification.blade.php ENDPATH**/ ?>