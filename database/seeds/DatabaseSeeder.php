<?php

use Illuminate\Database\Seeder;
use Database\seeds\UsersTableDataSeeder;
use Database\seeds\PermissionTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableDataSeeder::class);
        // $this->call(PermissionTableSeeder::class);
        // $this->call('UsersTableDataSeeder','PermissionTableSeeder');
    }
}
