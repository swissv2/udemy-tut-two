<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


//add the seeder
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create the CRUD functions
        $createPermission = Permission::create(['name' => 'Create Post']);
        $readPermission = Permission::create(['name' => 'Read Post']);
        $updatePermission = Permission::create(['name' => 'Update Post']);
        $deleteermission = Permission::create(['name' => 'Delete Post']);
    }
}
