<?php echo e(Form::text('translatable[site_name]', clean(trans('setting::attributes.translatable.site_name')), $errors, $settings, ['required' => true])); ?>


<?php echo $__env->make('media::admin.image_picker.single', [
    'title' => clean(trans('setting::attributes.site_logo')),
    'inputName' => 'site_logo',
    'media' => $siteLogo,
    'help' => clean(trans('setting::settings.form.recommend_image_size')),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo e(Form::text('site_email', clean(trans('setting::attributes.site_email')), $errors, $settings, ['required' => true])); ?>


<?php echo e(Form::select('supported_locales', clean(trans('setting::attributes.supported_locales')), $errors, $locales, $settings, ['class' => 'select2', 'required' => true, 'multiple' => true])); ?>

<?php echo e(Form::select('default_locale', clean(trans('setting::attributes.default_locale')), $errors, $locales, $settings, ['required' => true,'class' => 'select2'])); ?>

<?php echo e(Form::select('default_timezone', clean(trans('setting::attributes.default_timezone')), $errors, $timeZones, $settings, ['required' => true,'class' => 'select2'])); ?>


    <?php /**PATH C:\xampp\htdocs\sraservices_working\Modules/Setting/Resources/views/admin/settings/tabs/general.blade.php ENDPATH**/ ?>