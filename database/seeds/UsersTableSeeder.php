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

        $aaron = User::create([
            'name' => 'Aaron Reacts',
            'email' => 'aaron@reacts.se',
            'password' => Hash::make('react')
        ]);

        $pk = User::create([
            'name' => 'Per Kristian "The PK" Svanberg',
            'email' => 'pk@bootstrap.se',
            'password' => Hash::make('bootstrap')
        ]);

        $fabian = User::create([
            'name' => 'Fabian "the chilli" Olsson',
            'email' => 'fabia@fiat.se',
            'password' => Hash::make('fiatfabia')
        ]);

        $nittarn = User::create([
            'name' => 'Joakim Malmberg',
            'email' => 'nittarn@nittax.se',
            'password' => Hash::make('nittarn')
        ]);

        $admin->roles()->attach($adminRole);
        $aaron->roles()->attach($studentRole);
        $pk->roles()->attach($studentRole);
        $fabian->roles()->attach($studentRole);
        $nittarn->roles()->attach($studentRole);
    }
}
