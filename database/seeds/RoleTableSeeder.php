<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleUser = new Role();
        $roleUser->name = 'user';
        $roleUser->description = 'A Simple User';
        $roleUser->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'admin';
        $roleAdmin->description = 'An Admin User';
        $roleAdmin->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'editor';
        $roleAdmin->description = 'An Editor User';
        $roleAdmin->save();

        $roleModerator = new Role();
        $roleModerator->name = 'moderator';
        $roleModerator->description = 'A Moderator User';
        $roleModerator->save();
    }
}
