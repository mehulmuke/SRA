<?php echo e(Form::password('password', clean(trans('user::attributes.users.new_password')), $errors)); ?>

<?php echo e(Form::password('password_confirmation', clean(trans('user::attributes.users.new_password_confirmation')), $errors)); ?>

  <?php /**PATH /var/www/sraservices/Modules/User/Resources/views/admin/profile/tabs/new_password.blade.php ENDPATH**/ ?>