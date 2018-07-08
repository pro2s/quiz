<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::where('name', 'admin')->first();
        $roleEditor  = Role::where('name', 'editor')->first();
        $roleModerator  = Role::where('name', 'moderator')->first();
        
        $admin = new User();
        $admin->name = 'Admin User';
        $admin->email = 'admin@localhost';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($roleAdmin);
        
        $editor = new User();
        $editor->name = 'Editor User';
        $editor->email = 'editor@localhost';
        $editor->password = bcrypt('editor');
        $editor->save();
        $editor->roles()->attach($roleEditor);

        $moderator = new User();
        $moderator->name = 'Moderator User';
        $moderator->email = 'moderator@localhost';
        $moderator->password = bcrypt('moderator');
        $moderator->save();
        $moderator->roles()->attach($roleModerator);
    }
}
