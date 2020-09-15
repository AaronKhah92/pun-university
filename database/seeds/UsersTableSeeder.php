<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \Carbon\Carbon;
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

        DB::table('role_user')->truncate();


        $adminRole = Role::where('name', 'admin')->first();
        $studentRole = Role::where('name', 'student')->first();

        $admin = User::create([
            'name' => 'Aaron Admin',
            'email' => 'aaron@admin.se',
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'email_verified_at' => now()
        ]);

        $aaron = User::create([
            'name' => 'Aaron Reacts',
            'email' => 'aaron@reacts.se',
            'password' => Hash::make('react'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'email_verified_at' => now()
        ]);

        $pk = User::create([
            'name' => 'Per Kristian "The PK" Svanberg',
            'email' => 'pk@bootstrap.se',
            'password' => Hash::make('bootstrap'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'email_verified_at' => now()
        ]);

        $fabian = User::create([
            'name' => 'Fabian "the chilli" Olsson',
            'email' => 'fabia@fiat.se',
            'password' => Hash::make('fiatfabia'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'email_verified_at' => now()
        ]);

        $nittarn = User::create([
            'name' => 'Joakim Malmberg',
            'email' => 'nittarn@nittax.se',
            'password' => Hash::make('nittarn'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'email_verified_at' => now()
        ]);

        $admin->roles()->attach($adminRole);
        $aaron->roles()->attach($studentRole);
        $pk->roles()->attach($studentRole);
        $fabian->roles()->attach($studentRole);
        $nittarn->roles()->attach($studentRole);
    }
}
