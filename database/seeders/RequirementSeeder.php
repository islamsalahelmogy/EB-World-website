<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requirments')->insert([
            'subject_id' => '2',
            'requirment_id'=>'1'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '3',
            'requirment_id'=>'1'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '3',
            'requirment_id'=>'2'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '4',
            'requirment_id'=>'1'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '4',
            'requirment_id'=>'2'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '4',
            'requirment_id'=>'3'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '6',
            'requirment_id'=>'3'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '6',
            'requirment_id'=>'2'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '8',
            'requirment_id'=>'7'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '8',
            'requirment_id'=>'9'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '10',
            'requirment_id'=>'7'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '10',
            'requirment_id'=>'9'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '13',
            'requirment_id'=>'12'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '14',
            'requirment_id'=>'13'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '14',
            'requirment_id'=>'12'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '16',
            'requirment_id'=>'15'
        ]);
    
        DB::table('requirments')->insert([
            'subject_id' => '17',
            'requirment_id'=>'15'
        ]);
        DB::table('requirments')->insert([
            'subject_id' => '17',
            'requirment_id'=>'16'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '21',
            'requirment_id'=>'22'
        ]);

        DB::table('requirments')->insert([
            'subject_id' => '20',
            'requirment_id'=>'22'
        ]);
        DB::table('requirments')->insert([
            'subject_id' => '19',
            'requirment_id'=>'22'
        ]);

    }
}
