<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//create the use case

use App\Models\Role;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //give the user stuff out
        $userRole = Role::create(['name' => 'user']);
        //give the admin stuff out
        $adminRole = Role::create(['name' => 'admin']);


        //create the Admin seeder account
        User::create([
            'name' => 'Admin',
            'email' => 'admin@udemy-tut-two.test',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role_id' => $adminRole->id,
        ]);

    }
}
