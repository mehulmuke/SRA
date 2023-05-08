<?php echo $__env->yieldPushContent('styles'); ?>
<?php if(setting('custom_css')!=''): ?>
    <style>
        <?php echo setting('custom_css'); ?>

    </style>
<?php endif; ?>
<script>
(function () {
    "use strict";
    window.CI = {
        version: '1.0.0',
        csrfToken: '<?php echo e(csrf_token()); ?>',
        baseUrl: '<?php echo e(url('/')); ?>',
        langs: {},
    };
    
    CI.langs['admin::admin.buttons.delete'] = '<?php echo e(clean(trans('admin::admin.buttons.delete'))); ?>';
    CI.langs['admin::admin.delete.confirmation'] = '<?php echo e(clean(trans('admin::admin.delete.confirmation'))); ?>';
    CI.langs['admin::admin.delete.confirmation_message'] = '<?php echo e(clean(trans('admin::admin.delete.confirmation_message'))); ?>';
    CI.langs['admin::admin.delete.btn_delete'] = '<?php echo e(clean(trans('admin::admin.delete.btn_delete'))); ?>';
    CI.langs['admin::admin.delete.btn_cancel'] = '<?php echo e(clean(trans('admin::admin.delete.btn_cancel'))); ?>';
    CI.langs['admin::admin.delete.success_message'] = '<?php echo e(clean(trans('admin::admin.delete.success_message'))); ?>';
    
     CI.langs['media::medias.success_message'] = '<?php echo e(clean(trans('media::medias.success_message'))); ?>';
    CI.langs['media::medias.media_manager'] = '<?php echo e(clean(trans('media::medias.media_manager'))); ?>';
    CI.langs['media::messages.image_has_been_added'] = '<?php echo e(clean(trans('media::messages.image_has_been_added'))); ?>';
})();
</script>

<?php echo setting('googleanalyticscode',null,0); ?>




<?php echo $__env->yieldPushContent('general'); ?>

<?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
<?php /**PATH F:\laragon\www\sraservices_working\Modules/Admin/Resources/views/include/general.blade.php ENDPATH**/ ?>