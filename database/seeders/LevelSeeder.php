<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'name' => 'اولي',
        ]);

        DB::table('levels')->insert([
            'name' => 'ثانية',
        ]);
        DB::table('levels')->insert([
            'name' => 'ثالثة',
        ]);
        DB::table('levels')->insert([
            'name' => 'رابعة',
        ]);
    }
}
