<?php

namespace Modules\Setting\Admin\Tabs;

use Modules\Admin\Ui\CiTab;
use Modules\Admin\Ui\CiTabs;
use Modules\Base\Helpers\Locale;
use Modules\Base\Helpers\TimeZone;
use Modules\User\Entities\Role;
use Modules\Media\Entities\Media;

class SettingTabs extends CiTabs
{
    /**
     * Make new ci tabs with groups.
     *
     * @return void
     */
    public function make()
    {
        $this->group('general_settings', clean(trans('setting::settings.tabs.group.general_settings')))
            ->active()
            ->add($this->general())
            ->add($this->theme())
            ->add($this->user())
            //->add($this->files())
            ->add($this->emailSetup());
            //->add($this->customJsCSS());

/*$this->group('social_logins', clean(trans('setting::settings.tabs.group.social_logins')))
            ->add($this->facebook())
            ->add($this->google());

        $this->group('advertisement_settings', clean(trans('setting::settings.tabs.group.advertisement_settings')))
            ->add($this->advertisement());*/



    }

    private function general()
    {
        return tap(new CiTab('general', clean(trans('setting::settings.tabs.general'))), function (CiTab $tab) {
            $tab->active();
            $tab->weight(5);

            $tab->fields([
                'translatable.site_name',
                'site_email',
                'supported_locales.*',
                'default_locale',
                'default_timezone',
            ]);

            $siteLogo = Media::findOrNew(setting('site_logo'));

            $tab->view('setting::admin.settings.tabs.general', [
                'locales' => Locale::all(),
                'timeZones' => TimeZone::all(),
                'siteLogo'=>$siteLogo,
            ]);
        });
    }

    private function theme()
    {
        return tap(new CiTab('theme', clean(trans('setting::settings.tabs.theme'))), function (CiTab $tab) {
            $tab->weight(5);

            $tab->fields([
            ]);

            $tab->view('setting::admin.settings.tabs.theme', [ ]);
        });
    }

    private function user()
    {
        return tap(new CiTab('user', clean(trans('setting::settings.tabs.user'))), function (CiTab $tab) {
            $tab->weight(10);

            $tab->fields([
                'user_role',
            ]);

            $tab->view('setting::admin.settings.tabs.user', [
                'roles' => Role::list(),
            ]);
        });
    }

    private function files()
    {
        return tap(new CiTab('files', clean(trans('setting::settings.tabs.files'))), function (CiTab $tab) {
            $tab->weight(10);

            $tab->fields([
                'default_file_size',
            ]);

            $tab->view('setting::admin.settings.tabs.files');
        });
    }

    private function emailSetup()
    {
        return tap(new CiTab('email', clean(trans('setting::settings.tabs.email'))), function (CiTab $tab) {
            $tab->weight(30);
            $tab->fields(['mail_from_address']);
            $tab->view('setting::admin.settings.tabs.email', [
                'encryptionProtocols' => $this->getMailEncryptionProtocols(),
            ]);
        });
    }

    private function getMailEncryptionProtocols()
    {
        return ['' => clean(trans('admin::admin.form.please_select'))] + clean(trans('setting::settings.form.email_encryption_protocols'));
    }

    private function customJsCSS()
    {
        return tap(new CiTab('custom_js_css', trans('setting::settings.tabs.custom_js_css')), function (CiTab $tab) {
            $tab->weight(35);
            $tab->view('setting::admin.settings.tabs.custom_js_css');
        });
    }

    private function advertisement()
    {
        return tap(new CiTab('ad_blocks', clean(trans('setting::settings.tabs.ad_blocks'))), function (CiTab $tab) {
            $tab->weight(5);

            $tab->fields([]);

            $tab->view('setting::admin.settings.tabs.advertisement');
        });
    }

    private function facebook()
    {
        return tap(new CiTab('facebook', clean(trans('setting::settings.tabs.facebook'))), function (CiTab $tab) {
            $tab->weight(10);

            $tab->fields([
                'facebook_login_enabled',
                'translatable.facebook_login_label',
                'facebook_login_app_id',
                'facebook_login_app_secret',
            ]);

            $tab->view('setting::admin.settings.tabs.facebook');
        });
    }

    private function google()
    {
        return tap(new CiTab('google', clean(trans('setting::settings.tabs.google'))), function (CiTab $tab) {
            $tab->weight(20);

            $tab->fields([
                'google_login_enabled',
                'translatable.google_login_label',
                'google_login_client_id',
                'google_login_client_secret',
            ]);

            $tab->view('setting::admin.settings.tabs.google');
        });
    }

}
