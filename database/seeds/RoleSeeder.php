<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $coach_user = \App\Role::create([
            'name' => 'Coach',
            'slug' => 'coach',
            'permissions' => [
                'create_programm' => true,
                'edit_programm' => true
            ]
        ]);

        $moderator = \App\Role::create([
            'name' => 'Moderator',
            'slug' => 'moderator',
            'permissions' => [
                'publish_programm' => true,
                'delete_programm' => true,
                'watch_users' => true,
                'delete_users' => true
            ]
        ]);

        $client_user = \App\Role::create([
            'name' => 'User',
            'slug' => 'user',
            'permissions' => [
                'check_programm' => true,
                'change_programm' => true
            ]
        ]);

    }
}
