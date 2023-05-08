<div class="card">
    <div class="card-header">
        <div class="card-head-row card-tools-still-right">
            <h4 class="card-title"><?php echo e(clean(trans("admin::dashboard.most_downloaded_files"))); ?></h4>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive table-hover table-sales">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(clean(trans("admin::dashboard.table.file"))); ?></th>
                                <th><?php echo e(clean(trans("admin::dashboard.table.size"))); ?></th>
                                <th><?php echo e(clean(trans("admin::dashboard.table.downloads_count"))); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $inc=0;
                            ?>
                            <?php $__currentLoopData = $mostDownloadFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php 
                                
                                $inc++;
                            ?>
                            
                            <tr>
                                <td>
                                <?php echo e($inc); ?>

                                </td>
                                <td><?php echo e($file->filename); ?></td>
                                <td>
                                    <?php echo e(display_filesize($file->size)); ?>

                                </td>
                                <td>
                                    <?php echo e($file->download); ?> <?php echo e(clean(trans("admin::dashboard.table.downloads"))); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH F:\laragon\www\sraservices\Modules/Admin/Resources/views/dashboard/include/most-download.blade.php ENDPATH**/ ?>