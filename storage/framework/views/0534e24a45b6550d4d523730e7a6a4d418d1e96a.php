<?php $__env->startComponent('admin::include.page.header'); ?>
    <?php $__env->slot('title', clean(trans('translation::translations.translations'))); ?>
    <li class="nav-item">
        <a href="#">
            <?php echo e(clean(trans('translation::translations.translations'))); ?>

        </a>
    </li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?php echo e(clean(trans('translation::translations.translations'))); ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover translations-table">
                            <thead>
                                <tr>
                                    <th><?php echo e(clean(trans('translation::translations.table.key'))); ?></th>

                                    <?php $__currentLoopData = supported_locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th><?php echo e(clean($language['name'])); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $translations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $translation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <tr>
                                        <td><?php echo e(clean($key)); ?></td>
                                        <?php $__currentLoopData = supported_locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td class="translation-td">
                                                <a href="#" class="translation editable-click <?php echo e(array_has($translation, $locale) ? '' : 'editable-empty'); ?>"
                                                    data-locale="<?php echo e(clean($locale)); ?>"
                                                    data-key="<?php echo e(clean($key)); ?>"
                                                ><?php echo e(clean(array_get($translation, $locale))); ?></a>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Translation/Resources/views/admin/translations/index.blade.php ENDPATH**/ ?>