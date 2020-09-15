<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Course::create([
            'name' => 'PHP',
            'description' => 'Both loved and hated language.'
        ]);

        Course::create([
            'name' => 'JavaScript',
            'description' => 'The most popular scripting language.'
        ]);

        Course::create([
            'name' => 'Laravel',
            'description' => 'Man får läravel'
        ]);
    }
}
