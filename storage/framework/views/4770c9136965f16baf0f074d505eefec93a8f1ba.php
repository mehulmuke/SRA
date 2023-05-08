<div class="sidebar sidebar-style-2" data-background-color="<?php echo e(setting('theme_sidebar_color','white')); ?>">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <?php if(isset($currentUser->profile_image->path)): ?>
                        <img src="<?php echo e($currentUser->profile_image->path); ?>" alt="..." class="avatar-img rounded-circle">
                    <?php else: ?>
                        <img src="<?php echo e(url('modules/admin/images/user-icon.png')); ?>" alt="..." class="avatar-img rounded-circle">
                    <?php endif; ?>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <i class="fa fa-user-circle-o"></i><span><?php echo e(clean($currentUser->full_name)); ?></span>
                            <span class="user-level"><?php echo e(clean($currentUser->roles()->pluck('name')->implode(', '))); ?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="<?php echo e(route('admin.profile.edit')); ?>">
                                    <span class="link-collapse"><?php echo e(clean(trans('user::users.profile'))); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('admin.logout')); ?>">
                                    <span class="link-collapse"><?php echo e(clean(trans('user::auth.logout'))); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php echo clean($sidebar, array('Attr.EnableID' => true)); ?>

            
        </div>
    </div>
</div>
		<?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Admin/Resources/views/include/sidebar.blade.php ENDPATH**/ ?>