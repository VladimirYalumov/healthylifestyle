<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $coach_user = \App\Role::create([
            'name' => 'Coach',
            'slug' => 'coach',
            'permissions' => [
                'create_programm' => true
            ]
        ]);

        $moderator = \App\Role::create([
            'name' => 'Moderator',
            'slug' => 'moderator',
            'permissions' => [
                'publish_programm' => true,
                'delete_programm' => true
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
