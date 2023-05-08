<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="<?php echo e(setting('theme_logo_header_color','blue')); ?>">
        
        <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="logo">
            <?php if(is_null(get_site_logo())): ?>
                <h2 class="navbar-brand title"><?php echo e(setting('site_name') ? setting('site_name') : ''); ?></h2>
            <?php else: ?>
                <img src="<?php echo e(get_site_logo()); ?>" alt="<?php echo e(setting('site_name')); ?>" class="navbar-brand">
            <?php endif; ?>
        </a>
        <?php if(!$fullwidth): ?>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <?php endif; ?>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        
        <?php if(!$fullwidth): ?>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
        <?php endif; ?>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="<?php echo e(setting('theme_navbar_header_color','blue2')); ?>">
        
        <div class="container-fluid">
            
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <?php if(Auth::check()): ?>
                <?php if ($currentUser->hasAccess('admin.files.manager')) : ?>
                    <?php if(request()->routeIs('admin.files.manager')): ?>
                        <li class="nav-item hidden-caret">
                            <a class="nav-link" href="<?php echo e(route('admin.dashboard.index')); ?>" role="button" title="">
                                <?php echo e(clean(trans('admin::dashboard.dashboard'))); ?>

                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item hidden-caret">
                            <a class="nav-link" href="<?php echo e(route('admin.files.manager')); ?>" role="button" title="<?php echo e(clean(trans('admin::dashboard.file_manager'))); ?>">
                                <i class="fas fa-home"></i> 
                            </a>
                        </li>
                    <?php endif; ?>        
                           
                <?php endif; ?>
                <?php endif; ?> 
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="localeDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo e(strtoupper(locale())); ?>

                    </a>
                    <ul class="dropdown-menu animated fadeIn" aria-labelledby="localeDropdown">
                        <div class="scrollbar-outer">
                            <li>
                                <?php $__currentLoopData = supported_locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <a class="dropdown-item" href="<?php echo e(localized_url($locale)); ?>"><?php echo e(clean($language['name'])); ?></a>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <?php if(isset($currentUser->profile_image->path)): ?>
                                <img src="<?php echo e($currentUser->profile_image->path); ?>" alt="..." class="avatar-img rounded-circle">
                            <?php else: ?>
                                <img src="<?php echo e(url('modules/admin/images/user-icon.png')); ?>" alt="..." class="avatar-img rounded-circle">
                            <?php endif; ?>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                        <?php if(Auth::check()): ?>
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <?php if(isset($currentUser->profile_image->path)): ?>
                                            <img src="<?php echo e($currentUser->profile_image->path); ?>" alt="..." class="avatar-img rounded">
                                        <?php else: ?>
                                            <img src="<?php echo e(url('modules/admin/images/user-icon.png')); ?>" alt="..." class="avatar-img rounded">
                                        <?php endif; ?>
                                    
                                    </div>
                                    <div class="u-text">
                                        <h4><?php echo e(clean($currentUser->full_name)); ?></h4>
                                        <p class="text-muted"><?php echo e(clean($currentUser->email)); ?></p><a href="<?php echo e(route('admin.profile.edit')); ?>" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('admin.profile.edit')); ?>"><?php echo e(clean(trans('user::users.profile'))); ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>"><?php echo e(clean(trans('user::auth.logout'))); ?></a>
                            </li>
                        <?php else: ?>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('admin.login')); ?>"><?php echo e(clean(trans('user::auth.sign_in'))); ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('admin.register')); ?>"><?php echo e(clean(trans('user::auth.sign_up'))); ?></a>
                            </li>    
                        <?php endif; ?>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>		
<?php /**PATH F:\laragon\www\sraservices_working\Modules/Admin/Resources/views/include/header.blade.php ENDPATH**/ ?>