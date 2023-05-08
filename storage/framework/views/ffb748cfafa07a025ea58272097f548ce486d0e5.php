<?php if($group->shouldShowHeading()): ?>
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section"><?php echo e($group->getName()); ?></h4>
    </li>
<?php endif; ?>

<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $item; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH F:\laragon\www\sraservices_working\resources\views/vendor/sidebar/group.blade.php ENDPATH**/ ?>