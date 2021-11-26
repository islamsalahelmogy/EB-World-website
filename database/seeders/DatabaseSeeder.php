<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\Admin::factory(3)->create();
        $this->call(DepartmentSeeder::class);
        $this->call(LevelSeeder::class);
        \App\Models\Doctor::factory(10)->create();
        $this->call(SubjectSeeder::class);
        \App\Models\Inquiry::factory(2)->create();
        \App\Models\Reply::factory(4)->create();
        $this->call(RequirementSeeder::class);
    }
}
