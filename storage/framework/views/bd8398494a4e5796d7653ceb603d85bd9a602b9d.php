<?php echo e(Form::text('email_from_address', clean(trans('setting::attributes.email_from_address')), $errors, $settings)); ?>

<?php echo e(Form::text('email_from_name', clean(trans('setting::attributes.email_from_name')), $errors, $settings)); ?>

<?php echo e(Form::text('email_host', clean(trans('setting::attributes.email_host')), $errors, $settings)); ?>

<?php echo e(Form::text('email_port', clean(trans('setting::attributes.email_port')), $errors, $settings)); ?>

<?php echo e(Form::text('email_username', clean(trans('setting::attributes.email_username')), $errors, $settings)); ?>

<?php echo e(Form::password('email_password', clean(trans('setting::attributes.email_password')), $errors, $settings)); ?>

<?php echo e(Form::select('email_encryption', clean(trans('setting::attributes.email_encryption')), $errors, $encryptionProtocols, $settings)); ?>

   <?php /**PATH F:\laragon\www\sraservices\Modules/Setting/Resources/views/admin/settings/tabs/email.blade.php ENDPATH**/ ?>