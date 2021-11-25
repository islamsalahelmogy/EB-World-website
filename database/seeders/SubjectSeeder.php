<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'التفاضل',
            'code' => 'MTH'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',1)->get()->random()->id,
            'department_id' => '1',
            'level_id' => '1',
        ]);

        DB::table('subjects')->insert([
            'name' => 'معادلات تفاضلية',
            'code' => 'MTH'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',1)->get()->random()->id,
            'department_id' => '1',
            'level_id' => '2',
        ]);

        DB::table('subjects')->insert([
            'name' => 'التكامل',
            'code' => 'MTH'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',1)->get()->random()->id,
            'department_id' => '1',
            'level_id' => '2',
        ]);

        DB::table('subjects')->insert([
            'name' => 'الجبر الخطي',
            'code' => 'MTH'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',1)->get()->random()->id,
            'department_id' => '1',
            'level_id' => '3',
        ]);

        DB::table('subjects')->insert([
            'name' => 'الهندسة',
            'code' => 'MTH'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',1)->get()->random()->id,
            'department_id' => '1',
            'level_id' => '4',
        ]);

        DB::table('subjects')->insert([
            'name' => 'نظرية اعداد',
            'code' => 'MTH'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',1)->get()->random()->id,
            'department_id' => '1',
            'level_id' => '4',
        ]);


        //Department 2  قسم اللغة الانجليزية 
        
        
        DB::table('subjects')->insert([
            'name' => 'ترجمة',
            'code' => 'EN'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',2)->get()->random()->id,
            'department_id' => '2',
            'level_id' => '3',
        ]);

        DB::table('subjects')->insert([
            'name' => 'صوتيات اللغة ',
            'code' => 'EN'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',2)->get()->random()->id,
            'department_id' => '2',
            'level_id' => '2',
        ]);

        DB::table('subjects')->insert([
            'name' => 'قواعد اللغة الانجليزية',
            'code' => 'EN'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',2)->get()->random()->id,
            'department_id' => '2',
            'level_id' => '1',
        ]);

        DB::table('subjects')->insert([
            'name' => ' الدراما الانجليزية',
            'code' => 'EN'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',2)->get()->random()->id,
            'department_id' => '2',
            'level_id' => '4',
        ]);


        //Department 3  قسم العلوم  
        
        
        DB::table('subjects')->insert([
            'name' => 'بصريات',
            'code' => 'SC'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',3)->get()->random()->id,
            'department_id' => '3',
            'level_id' => '3',
        ]);

        DB::table('subjects')->insert([
            'name' => ' كمياء عضوية ',
            'code' => 'SC'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',3)->get()->random()->id,
            'department_id' => '3',
            'level_id' => '2',
        ]);

        DB::table('subjects')->insert([
            'name' => 'كمياء غير عضوية ',
            'code' => 'SC'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',3)->get()->random()->id,
            'department_id' => '3',
            'level_id' => '1',
        ]);

        DB::table('subjects')->insert([
            'name' => 'كمياء تحليلة',
            'code' => 'SC'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',3)->get()->random()->id,
            'department_id' => '3',
            'level_id' => '4',
        ]);

        
        //Department 4  قسم الحاسبات  
        
        
        DB::table('subjects')->insert([
            'name' => 'نظم تشغيل حاسب',
            'code' => 'CS'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',4)->get()->random()->id,
            'department_id' => '4',
            'level_id' => '3',
        ]);

        DB::table('subjects')->insert([
            'name' => '  قواعد بيانات ',
            'code' => 'CS'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',4)->get()->random()->id,
            'department_id' => '4',
            'level_id' => '2',
        ]);

        DB::table('subjects')->insert([
            'name' => 'شبكات الحاسب',
            'code' => 'CS'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',4)->get()->random()->id,
            'department_id' => '4',
            'level_id' => '1',
        ]);

        DB::table('subjects')->insert([
            'name' => 'مبادئ برمجة',
            'code' => 'CS'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',4)->get()->random()->id,
            'department_id' => '4',
            'level_id' => '4',
        ]);


                //Department 5 قسم التاريخ   
        
        
        DB::table('subjects')->insert([
            'name' => 'تاريخ العرب القديم ',
            'code' => 'HS'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',5)->get()->random()->id,
            'department_id' => '5',
            'level_id' => '3',
        ]);
    
        DB::table('subjects')->insert([
            'name' => 'تاريخ اوروبا ',
            'code' => 'HS'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',5)->get()->random()->id,
            'department_id' => '5',
            'level_id' => '2',
        ]);
    
        DB::table('subjects')->insert([
            'name' => ' تاريخ العراق الحديث',
            'code' => 'HS'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',5)->get()->random()->id,
            'department_id' => '5',
            'level_id' => '1',
        ]);
    
        DB::table('subjects')->insert([
            'name' => 'فلسفة التاريخ',
            'code' => 'HS'.Str::random(10),
            'doctor_id' => Doctor::where('department_id',5)->get()->random()->id,
            'department_id' => '5',
            'level_id' => '4',
        ]);
    

    }
}
