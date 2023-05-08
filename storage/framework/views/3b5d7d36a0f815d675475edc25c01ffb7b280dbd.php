
<?php echo e(Form::number('file_size', clean(trans('user::attributes.users.file_size')), $errors, $user,['placeholder' => clean(trans('user::attributes.users.file_size_placeholder'))])); ?>


<?php echo e(Form::select('file_extensions', clean(trans('user::attributes.users.file_extension')), $errors, $fileextensions, $user, ['class' => 'select2', 'multiple' => true,])); ?>


<?php echo e(Form::select('folders', clean(trans('user::attributes.users.file_folder')), $errors, $filefolders, $user, ['class' => 'select2', 'multiple' => true,'help'=>clean(trans('user::attributes.users.sub_folder_automatically_assign_when_you_select_the_main_folder'))])); ?><?php /**PATH F:\laragon\www\sraservices\Modules/User/Resources/views/admin/users/tabs/files_setting.blade.php ENDPATH**/ ?>