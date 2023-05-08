<div class="row">
    <div class="col-md-12">
        <div class="accordion accordion-secondary ci-accordion" id="<?php echo e($name); ?>">
            <div class="row">  
                <div class="col-lg-3 col-md-4">
                
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card ci-nav-tabs">
                        <div class="card-header <?php echo e(($options['active'] ?? false) ? '' : 'collapsed'); ?>" 
                            <?php if(count($groups) > 1): ?>
                                data-toggle="collapse" data-target="#<?php echo e($group); ?>"
                            <?php endif; ?>
                            <?php echo e(($options['active'] ?? false) ? 'aria-expanded="true"' : ''); ?>

                        >
                            <div class="span-title">
                               <?php echo e(clean($options['title'])); ?>

                            </div>
                            <div class="span-mode"></div>
                        </div>

                        <div id="<?php echo e($group); ?>" class="collapse <?php echo e(($options['active'] ?? false) ? 'show' : ''); ?>" data-parent="#<?php echo e($name); ?>">
                            <div class="card-body">
                                <div class="nav flex-column nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php echo e($tabs->group($group)->navs()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <?php echo e($contents); ?>

                        
                    </div>
                </div>
            
            </div>
        </div>
            
    </div>
</div><?php /**PATH F:\laragon\www\sraservices\Modules/Admin/Resources/views/include/tabs/view.blade.php ENDPATH**/ ?>