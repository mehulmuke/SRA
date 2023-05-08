<?php

namespace App\Installer;

use Modules\User\Entities\Role;
use Modules\User\Entities\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class AdminUser
{
    public function setup($data)
    {
        $role = Role::create(['name' => 'Admin', 'permissions' => $this->getAdminRolePermissions()]);

        $admin = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $activation = Activation::create($admin);
        Activation::complete($admin, $activation->code);

        $admin->roles()->attach($role);
    }

    private function getAdminRolePermissions()
    {
        return [
            // users
            'admin.users.index' => true,
            'admin.users.create' => true,
            'admin.users.edit' => true,
            'admin.users.destroy' => true,
            // roles
            'admin.roles.index' => true,
            'admin.roles.create' => true,
            'admin.roles.edit' => true,
            'admin.roles.destroy' => true,
            // translations
            'admin.translations.index' => true,
            'admin.translations.edit' => true,
            // settings
            'admin.settings.edit' => true,
            // Files
            'admin.files.manager' => true,
            'admin.files.index' => true,
            'admin.files.create' => true,
            'admin.files.edit' => true,
            'admin.files.destroy' => true,
            // files-extension
            'admin.files-extension.index' => true,
            'admin.files-extension.create' => true,
            'admin.files-extension.destroy' => true,
            // Folders
            'admin.folders.index' => true,
            'admin.folders.create' => true,
            'admin.folders.edit' => true,
            'admin.folders.destroy' => true,
            // Activity
            'admin.activity.index' => true,
            // Media
            'admin.media.index' => true,
            'admin.media.create' => true,
            'admin.media.destroy' => true, 
            
        ];
    }
}
