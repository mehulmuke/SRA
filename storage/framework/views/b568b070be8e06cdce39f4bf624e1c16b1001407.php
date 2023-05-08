<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean($title)); ?></h4>
                        
                        <?php if(isset($buttons, $name)): ?>
                            <?php $__currentLoopData = $buttons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if ($currentUser->hasAccess("admin.{$resource}.{$view}")) : ?>
                                    <a href="<?php echo e(route("admin.{$resource}.{$view}")); ?>" class="btn btn-primary ml-auto btn-actions btn-<?php echo e($view); ?>">
                                        <?php echo e(clean(trans("admin::resource.{$view}", ['resource' => $name]))); ?>

                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php echo e($buttons ?? ''); ?>

                        <?php endif; ?>
                    
                    </div>
                </div>
                <div class="card-body" id="<?php echo e(isset($resource) ? "{$resource}-table" : ''); ?>">
                    <div class="table-responsive">
                        <?php if(isset($thead)): ?>
                            <table class="display table table-striped table-hover <?php echo e($class ?? ''); ?>" id="<?php echo e($id ?? ''); ?>" >
                                <thead><?php echo e($thead); ?></thead>

                                <tbody><?php echo e($slot); ?></tbody>

                                <?php if(isset($tfoot)): ?>
                                    <tfoot><?php echo e($tfoot); ?></tfoot>
                                <?php endif; ?>
                            </table>
                        <?php else: ?>
                            <?php echo e($slot); ?>

                        <?php endif; ?>
                        <?php if(isset($customInclude)): ?>
                            <?php echo e($customInclude); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php if(isset($name)): ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            <?php if(isset($resource)): ?>
            (function () {
                "use strict";
                DataTable.setRoutes('#<?php echo e($resource); ?>-table .table', {
                    index: '<?php echo e("admin.{$resource}.index"); ?>',
                    
                    <?php if ($currentUser->hasAccess("admin.{$resource}.edit")) : ?>
                        <?php if(!isset($noedit)): ?>
                            edit: '<?php echo e("admin.{$resource}.edit"); ?>',
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if ($currentUser->hasAccess("admin.{$resource}.destroy")) : ?> 
                        destroy: '<?php echo e("admin.{$resource}.destroy"); ?>',
                    <?php endif; ?>
                });
                
            })();   
            <?php endif; ?>
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/include/page/table.blade.php ENDPATH**/ ?>