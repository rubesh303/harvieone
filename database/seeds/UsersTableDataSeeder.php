<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Designation;
use App\User;
class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

	            'name' => "Admin",

	            'email' => 'admin@mail.com',

	            'password' => Hash::make(12345678)

	        ]);
        $designation=array('Developer','Tester','Engineer');
        foreach ($designation as $key => $value) {
           Designation::create([
                'designation_name' => $value
            ]);
        }
        
    }
}
