<div class="row permission-row">
    <div class="col-md-12">
        <div class="btn-group permission-all pull-right">
            <button type="button" class="btn btn-default btn-sm btn-action-all" data-action="allow"><?php echo e(clean(trans('user::roles.permissions.allow_all'))); ?></button>
            <button type="button" class="btn btn-default btn-sm btn-action-all" data-action="deny"><?php echo e(clean(trans('user::roles.permissions.deny_all'))); ?></button>
            <button type="button" class="btn btn-default btn-sm btn-action-all" data-action="inherit"><?php echo e(clean(trans('user::roles.permissions.inherit_all'))); ?></button>
        </div>
    </div>
</div>

<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $modulePermissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row permission-row">
        <div class="col-md-12">
            <h2 class="border-bottom"><?php echo e(clean($module)); ?></h2>
        </div>
    </div>
    
    <?php $__currentLoopData = $modulePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $groupPermissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="permission-group">
        <div class="row permission-row">
            <div class="col-md-6 col-4 pl-4">
                <h3><?php echo e(clean(str_replace('admin.','',$group))); ?></h3>
            </div>
            <div class="col-md-6 col-8">
                <div class="btn-group permission-group-all pull-right">
                    <button type="button" class="btn btn-default btn-sm btn-action-all" data-action="allow"><?php echo e(clean(trans('user::roles.permissions.allow_all'))); ?></button>
                    <button type="button" class="btn btn-default btn-sm btn-action-all" data-action="deny"><?php echo e(clean(trans('user::roles.permissions.deny_all'))); ?></button>
                    <button type="button" class="btn btn-default btn-sm btn-action-all" data-action="inherit"><?php echo e(clean(trans('user::roles.permissions.inherit_all'))); ?></button>
                </div>
            </div>
        </div>
        
        <?php $__currentLoopData = $groupPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionAction => $permissionLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <div class="row permission-row">
                    <div class="col-md-6 col-4 pl-5">
                        <p><?php echo e(clean(trans($permissionLabel))); ?></p>
                    </div>
                    <div class="col-md-6 col-8 text-right">
                        <?php if(! is_null($entity)): ?>
                            <?php
                                $permissionValue = old('permissions')["{$group}.{$permissionAction}"] ?? permission_value($entity->permissions, "{$group}.{$permissionAction}")
                            ?>
                        <?php endif; ?>
                        <div class="form-check form-check-inline p-0 m-0">
                            
                            <div class="custom-control custom-radio">
                                <input type="radio" value="1" id="<?php echo e("{$group}-{$permissionAction}"); ?>-allow" name="permissions[<?php echo e("{$group}.{$permissionAction}"); ?>]" class="custom-control-input permission-allow" <?php echo e(isset($permissionValue) && $permissionValue == 1 ? 'checked' : ''); ?>>

                                <label class="custom-control-label" for="<?php echo e("{$group}-{$permissionAction}"); ?>-allow"><?php echo e(trans('user::roles.permissions.allow')); ?></label>
                            </div>
                            
                            <div class="custom-control custom-radio">
                                <input type="radio" value="-1" id="<?php echo e("{$group}-{$permissionAction}"); ?>-deny" name="permissions[<?php echo e("{$group}.{$permissionAction}"); ?>]" class="custom-control-input permission-deny" <?php echo e(isset($permissionValue) && $permissionValue == -1 ? 'checked' : ''); ?>>

                                <label class="custom-control-label" for="<?php echo e("{$group}-{$permissionAction}"); ?>-deny"><?php echo e(trans('user::roles.permissions.deny')); ?></label>
                            </div>
                            
                            <div class="custom-control custom-radio">
                                <input type="radio" value="0" id="<?php echo e("{$group}-{$permissionAction}"); ?>-inherit" name="permissions[<?php echo e("{$group}.{$permissionAction}"); ?>]" class="custom-control-input permission-inherit" <?php echo e(isset($permissionValue) && $permissionValue == 0 ? 'checked' : ''); ?>>

                                <label class="custom-control-label" for="<?php echo e("{$group}-{$permissionAction}"); ?>-inherit"><?php echo e(trans('user::roles.permissions.inherit')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/User/Resources/views/admin/permissions/index.blade.php ENDPATH**/ ?>