<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StudentclassesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(GradesTableSeeder::class);
    }
}
