<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'قسم الرياضيات',
            'descripion' =>'يهتم بعلوم الرياضيات البحته والتطبيقية والخوارزميات '
        ]);
        DB::table('departments')->insert([
            'name' => 'قسم اللغة الانجليزية',
            'descripion' =>' يهتم  باللغة الانجليزية '
        ]);
        DB::table('departments')->insert([
            'name' => 'قسم العلوم ',
            'descripion' =>' يهتم بالعلوم التطبيقيه وعلوم الطبيعة'
        ]);
        DB::table('departments')->insert([
            'name' => 'قسم الحاسبات ',
            'descripion' =>'يهتم بعلوم الحاسب والبرمجة '
        ]);
        DB::table('departments')->insert([
            'name' => 'قسم التاريخ',
            'descripion' =>'يهتم  بالتاريخ '
        ]);
    }
}
