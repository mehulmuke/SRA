<div class="row row-card-no-pd">
    <div class="col-sm-12">
        <h4 class="page-title  card-title border-bottom"><?php echo e(clean(trans("admin::dashboard.files"))); ?></h4>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-file"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category"><?php echo e(clean(trans("admin::dashboard.total_files"))); ?></p>
                            <h4 class="card-title"><?php echo e($totalFiles); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-file text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category"><?php echo e(clean(trans("admin::dashboard.this_month"))); ?></p>
                            <h4 class="card-title"><?php echo e($thisMonthFiles); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-file  text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category"><?php echo e(clean(trans("admin::dashboard.today"))); ?></p>
                            <h4 class="card-title"><?php echo e($todayFiles); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-cloud-download-alt text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category"><?php echo e(clean(trans("admin::dashboard.total_download"))); ?></p>
                            <h4 class="card-title"><?php echo e($totalDownload); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Admin/Resources/views/dashboard/include/files.blade.php ENDPATH**/ ?>