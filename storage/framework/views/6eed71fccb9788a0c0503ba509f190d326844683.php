<?php echo e(Form::text('first_name', clean(trans('user::attributes.users.first_name')), $errors, $currentUser, ['required' => true])); ?>

<?php echo e(Form::text('last_name', clean(trans('user::attributes.users.last_name')), $errors, $currentUser, ['required' => true])); ?>

<?php echo e(Form::email('email', clean(trans('user::attributes.users.email')), $errors, $currentUser, ['required' => true])); ?>

    
<?php echo $__env->make('media::admin.image_picker.single', [
    'title' => clean(trans('user::attributes.users.profile_image')),
    'inputName' => 'media[profile_image]',
    'media' => $currentUser->profile_image,
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sraservices/Modules/User/Resources/views/admin/profile/tabs/general.blade.php ENDPATH**/ ?>