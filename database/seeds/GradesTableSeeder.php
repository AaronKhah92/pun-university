<?php

use Illuminate\Database\Seeder;
use App\Grade;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::truncate();

        Grade::create([
            'name' => '_'
        ]);

        Grade::create([
            'name' => 'IG'
        ]);

        Grade::create([
            'name' => 'G'
        ]);

        Grade::create([
            'name' => 'VG'
        ]);
    }
}
