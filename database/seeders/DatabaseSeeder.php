<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//         $user=User::factory()->create([
//             'name'=>'Admin',
//             'email'=>'admin@example.com',
//         ]);
//        $user2=User::factory()->create([
//            'name'=>'Test',
//            'email'=>'admin@example.com',
//        ]);
//        User::factory(10)->create();
//        $role = Role::create(['name' => 'Seller']);
//        $user->assignRole($role);
//        $permission = Permission::create(['name' => 'edit Product']);
         $this->call(ProductSeeder::class);

    }
}
