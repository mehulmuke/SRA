<ul class="nav <?php echo e(setting('theme_sidebar_color','white')=='white' ? 'nav-primary' : ''); ?>">
    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $group; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /var/www/sra_annexure/resources/views/vendor/sidebar/menu.blade.php ENDPATH**/ ?>