<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Designation;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user= User::create([

	            'name' => "Admin",

	            'email' => 'admin@gmail.com',

	            'password' => Hash::make(123456)

	        ]);
        $designation=array('Developer','Tester','Engineer');
        foreach ($designation as $key => $value) {
           Designation::create([
                'designation_name' => $value
            ]);
        }
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([1]);
    }
}
