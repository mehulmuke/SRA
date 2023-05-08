<span data-toggle="tooltip" title="<?php echo e(is_null($date) ? '' : $date->toFormattedDateString()); ?>">
    <?php echo e(is_null($date) ? '-' : $date->diffForHumans()); ?>

</span>
<?php /**PATH /var/www/sraservices/Modules/Admin/Resources/views/include/table/date.blade.php ENDPATH**/ ?>