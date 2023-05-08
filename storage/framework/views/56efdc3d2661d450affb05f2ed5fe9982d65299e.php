<div class="row row-card-no-pd">
    <div class="col-sm-12">
        <h4 class="page-title card-title border-bottom"><?php echo e(clean(trans("admin::dashboard.users"))); ?></h4>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="fas fa-user-astronaut"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category"><?php echo e(clean(trans("admin::dashboard.total_users"))); ?></p>
                            <h4 class="card-title"><?php echo e($totalUsers); ?></h4>
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
                            <i class="fas fa-user-astronaut text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category"><?php echo e(clean(trans("admin::dashboard.this_month"))); ?></p>
                            <h4 class="card-title"><?php echo e($thisMonthUsers); ?></h4>
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
                            <i class="fas fa-user-astronaut  text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category"><?php echo e(clean(trans("admin::dashboard.today"))); ?></p>
                            <h4 class="card-title"><?php echo e($todayUsers); ?></h4>
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
                            <i class="fas fa-user-astronaut text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category"><?php echo e(clean(trans("admin::dashboard.activated"))); ?></p>
                            <h4 class="card-title"><?php echo e($activatUsers); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH F:\laragon\www\sraservices\Modules/Admin/Resources/views/dashboard/include/users.blade.php ENDPATH**/ ?>