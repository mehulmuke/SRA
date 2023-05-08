<?php echo e(Form::checkbox('google_login_enabled', clean(trans('setting::attributes.google_login_enabled')), clean(trans('setting::settings.form.enable_google_login')), $errors, $settings)); ?>

<?php echo e(Form::text('google_login_client_id', clean(trans('setting::attributes.google_login_client_id')), $errors, $settings, ['required' => true])); ?>

<?php echo e(Form::password('google_login_client_secret', clean(trans('setting::attributes.google_login_client_secret')), $errors, $settings, ['required' => true])); ?>

        <?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Setting/Resources/views/admin/settings/tabs/google.blade.php ENDPATH**/ ?>