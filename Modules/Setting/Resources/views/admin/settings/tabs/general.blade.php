{{ Form::text('translatable[site_name]', clean(trans('setting::attributes.translatable.site_name')), $errors, $settings, ['required' => true]) }}

@include('media::admin.image_picker.single', [
    'title' => clean(trans('setting::attributes.site_logo')),
    'inputName' => 'site_logo',
    'media' => $siteLogo,
    'help' => clean(trans('setting::settings.form.recommend_image_size')),
])

{{ Form::text('site_email', clean(trans('setting::attributes.site_email')), $errors, $settings, ['required' => true]) }}

{{ Form::select('supported_locales', clean(trans('setting::attributes.supported_locales')), $errors, $locales, $settings, ['class' => 'select2', 'required' => true, 'multiple' => true]) }}
{{ Form::select('default_locale', clean(trans('setting::attributes.default_locale')), $errors, $locales, $settings, ['required' => true,'class' => 'select2']) }}
{{ Form::select('default_timezone', clean(trans('setting::attributes.default_timezone')), $errors, $timeZones, $settings, ['required' => true,'class' => 'select2']) }}

    