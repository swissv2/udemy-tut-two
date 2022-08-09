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
        $userRole = Role::create(['name' => 'user', 'edit_id' => 0]);
        //give the admin stuff out
        $adminRole = Role::create(['name' => 'admin', 'edit_id' => 1]);
         //give the author stuff out
        $authorRole = Role::create(['name' => 'author', 'edit_id' => 0]);


        //create the Admin seeder account
        User::create([
            'name' => 'Admin',
            'email' => 'admin@udemy-tut-two.test',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role_id' => $adminRole->id,
        ]);

        //create an author seeder account
        User::create([
            'name' => 'Swissv2',
            'email' => 'swissv2@udemy-tut-two.test',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role_id' => $authorRole->id,
        ]);

         //create a basic user seeder account
         User::create([
            'name' => 'Tiny Tim',
            'email' => 'tiny@tim.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'role_id' => $userRole->id,
        ]);

    }
}
