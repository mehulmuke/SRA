<?php

namespace App\Installer;

use Modules\User\Entities\Role;
use Modules\Files\Entities\FileExtension;
use Modules\Folder\Entities\Folder;
use Modules\Setting\Entities\Setting;
use Illuminate\Support\Facades\Artisan;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class Application
{
    public function setup()
    {
        $this->generateApplicationKey();
        $this->setEnvVariables();
        $this->createCustomerRole();
        $this->createFileExtension();
        $this->createFileFolder();
        $this->setApplicationSettings();
        $this->createStorageFolder();
    }

    private function generateApplicationKey()
    {
        Artisan::call('key:generate', ['--force' => true]);
    }

    private function setEnvVariables()
    {
        $env = DotenvEditor::load();

        $env->setKey('APP_ENV', 'production');
        $env->setKey('APP_DEBUG', 'false');
        $env->setKey('APP_CACHE', 'true');
        $env->setKey('APP_URL', url('/'));

        $env->save();
    }

    private function createCustomerRole()
    {
        Role::create(['slug'=>'user','name' => 'User','permissions' => $this->getUserRolePermissions()]);
    }
    
    private function createFileExtension()
    {
        FileExtension::insert([
            ['name' => 'jpeg','assign_toall'=>1],
            ['name' => 'jpg','assign_toall'=>1],
            ['name' => 'png','assign_toall'=>1],
            ['name' => 'pdf','assign_toall'=>1],
            ['name' => 'mp4','assign_toall'=>1],
            ['name' => 'docx','assign_toall'=>1],
        ]);
    }
    
    private function createFileFolder()
    {
        Folder::insert([
            ['name' => 'main','slug' => 'main','assign_toall'=>1,'is_active'=>1],
        ]);
    }

    private function setApplicationSettings()
    {
        Setting::setMany([
            'supported_locales' => ['en'],
            'default_locale' => 'en',
            'default_timezone' => 'UTC',
            'user_role' => 2,
            'allow_registrations' => '1',
            'enable_file_preview' => '1',
            'enable_file_download' => '1',
            'enable_file_move' => '1',
            'enable_file_share' => '1',
            'auto_approve_user' => '1',
            'default_file_size' => '10',
            'auto_assign_folder_files' => '1',
            'delete_assign_folder_files' => '1',
            'theme_logo_header_color' => 'blue',
            'theme_navbar_header_color' => 'blue2',
            'theme_sidebar_color' => 'white',
            'theme_background_color' => 'bg1',
        ]);
    }

    private function createStorageFolder()
    {
        mkdir(public_path('storage'));
    }
    
    /**
     * Get user role permissions.
     *
     * @return array
     */
    private function getUserRolePermissions()
    {
        return [
            //Files
            'admin.files.manager' => true,
            'admin.files.index' => true,
            'admin.files.create' => true,
            'admin.files.edit' => true,
            'admin.files.destroy' => true,
             // Activity
            'admin.activity.index' => true,
            // Folders
            'admin.folders.create' => true,
            // Media
            'admin.media.index' => true,
            'admin.media.create' => true,
            'admin.media.destroy' => true,
            
        ];
    }
}
