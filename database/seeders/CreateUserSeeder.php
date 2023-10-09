<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Arkhan Saputra', 
            'email' => 'arkhansaputra@gmail.com',
            'password' => bcrypt('admin12345')
        ]);

        $role = Role::create(['name' => 'User']);
        $permissions = Permission::whereIn('name', ['user-jabatan', 'user-pelatihan'])->get();

        $role->permissions()->sync($permissions);
        $user->roles()->attach($role);
        
    }
}
