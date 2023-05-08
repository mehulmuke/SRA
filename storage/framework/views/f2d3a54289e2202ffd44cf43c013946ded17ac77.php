<li class="nav-item <?php echo e($active ? 'active' : ''); ?> <?php echo e($item->getItemClass() ? $item->getItemClass() : ''); ?>"> 
    <a 
        <?php if($item->hasItems()): ?>
            data-toggle="collapse" href="#<?php echo e(preg_replace('/\s+/', '',$item->getName())); ?>" 
        <?php else: ?>
            href="<?php echo e($item->getUrl()); ?>" 
        <?php endif; ?>
        
        <?php if($item->getNewTab()): ?>target="_blank"<?php endif; ?>
        
    >
        <i class="<?php echo e($item->getIcon()); ?>"></i>
        <span><?php echo e($item->getName()); ?></span>
        
        <?php $__currentLoopData = $badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo clean($badge, array('Attr.EnableID' => true)); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($item->hasItems()): ?><span class="caret"></span><?php endif; ?>
        
    </a>
    
    <?php $__currentLoopData = $appends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $append): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo clean($append, array('Attr.EnableID' => true)); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php if(count($items) > 0): ?>
        <div class="collapse" id="<?php echo e(preg_replace('/\s+/', '',$item->getName())); ?>">
            <ul class="nav nav-collapse">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo clean($item, array('Attr.EnableID' => true)); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    
</li>
<?php /**PATH F:\laragon\www\sraservices\resources\views/vendor/sidebar/item.blade.php ENDPATH**/ ?>