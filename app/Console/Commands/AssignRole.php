<?php

namespace App\Console\Commands;

use App\User;
use App\Role;
use Illuminate\Console\Command;

class AssignRole extends Command
{

    protected $signature = 'assign:role {role} {userID}';

    protected $description = 'Assign role to user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $slug = $this->argument('role');
            $role = Role::where('slug', $slug)->first();

            if (!$role) {
                $this->error("Invalid role $role");
            }

            $userID = $this->argument('userID');

            $user = User::where('id', $userID)->first();

            if (!$user) {
                $this->error("Invalid userID $userID");
            }

            $user->roles()->attach($role);
            $this->info("User ID: $userID now has role $slug");
        } catch (\Exception $exception){
            $this->error($exception->getMessage());
        }

    }
}
