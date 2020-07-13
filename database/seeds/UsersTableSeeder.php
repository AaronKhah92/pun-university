<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $studentRole = Role::where('name', 'student')->first();

        $admin = User::create([
            'name' => 'Aaron Admin',
            'email' => 'aaron@admin.se',
            'password' => Hash::make('admin')
        ]);

        $student = User::create([
            'name' => 'Aaron Reacts',
            'email' => 'aaron@reacts.se',
            'password' => Hash::make('react')
        ]);

        $admin->roles()->attach($adminRole);
        $student->roles()->attach($studentRole);
    }
}
