<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'super-admin',
            'display_name'=>'Super Admin',
            'description'=>'This is super admin of application',
        ]);
        DB::table('roles')->insert([
            'name'=>'school-admin',
            'display_name'=>'School Admin',
            'description'=>'This is school admin of application',
        ]);
        DB::table('roles')->insert([
            'name'=>'teacher',
            'display_name'=>'Teacher',
            'description'=>'This is Teacher of application',
        ]);DB::table('roles')->insert([
            'name'=>'student',
            'display_name'=>'Student',
            'description'=>'This is student admin of application',
        ]);
    }
}
