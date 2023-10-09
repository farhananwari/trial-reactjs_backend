<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin', 
            'email' => 'admin678@gmail.com',
            'password' => bcrypt('admin12345')
        ]);
        
        $role = Role::create(['name' => 'Super Admin']);
        $permissions = Permission::all();
        
        $role->permissions()->sync($permissions);
        $user->roles()->attach($role);
        
    }
}