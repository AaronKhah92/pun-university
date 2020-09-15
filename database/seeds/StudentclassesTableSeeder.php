<?php

use Illuminate\Database\Seeder;
use App\Studentclass;

class StudentclassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Studentclass::create([
            'name' => 'WCMS18'
        ]);

        Studentclass::create([
            'name' => 'WCMS19'
        ]);

        Studentclass::create([
            'name' => 'WCMS21'
        ]);
    }
}
