<?php echo e(Form::text('name', clean(trans('user::attributes.roles.name')), $errors, $role, ['required' => true])); ?>

<?php if($role->slug ?? false): ?>
    <?php echo e(Form::text('slug', clean(trans('user::attributes.roles.slug')), $errors, $role, ['required' => true])); ?>

<?php endif; ?>

    
<?php /**PATH F:\laragon\www\sraservices\Modules/User/Resources/views/admin/roles/tabs/general.blade.php ENDPATH**/ ?>