{{ Form::text('default_file_size', clean(trans('setting::attributes.default_file_size')), $errors, $settings, ['required' => true]) }}
{{ Form::checkbox('enable_file_download', clean(trans('setting::attributes.enable_file_download')), clean(trans('setting::settings.form.user_can_download_the_files')), $errors, $settings) }}
{{ Form::checkbox('enable_file_preview', clean(trans('setting::attributes.enable_file_preview')), clean(trans('setting::settings.form.display_preview_button_on_file_listing')), $errors, $settings) }}

{{ Form::checkbox('enable_file_move', clean(trans('setting::attributes.enable_file_move')), clean(trans('setting::settings.form.user_can_move_files_one_folder_to_other_folder')), $errors, $settings) }}
{{ Form::checkbox('enable_file_share', clean(trans('setting::attributes.enable_file_share')), clean(trans('setting::settings.form.user_can_share_files_other')), $errors, $settings) }}