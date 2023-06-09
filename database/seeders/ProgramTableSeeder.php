<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([


            "name_ar" => "خطة تجريب للمبتدئين",
            "name_en" => "Workout plan Beginner",
            'description_ar' => "04 تمارين للمبتدئين",
            'description_en' => "04 Workouts  for Beginner",
            'image' => "1.jfif",

        ]);

        Program::create([

            "name_ar" => "كسارة المرمى لكامل الجسم",
            "name_en" => "Full Body Goal Crusher",
            'description_ar' => "07 تمارين للمتوسط",
            'description_en' => "07 Workouts  for Intermediate",
            'image' => "2.jfif",

        ]);


        Program::create([

            "name_ar" => "قوة الجسم السفلية",
            "name_en" => "Lower Body Strength",
            'description_ar' => "05 تدريبات للوحش الحقيقي",
            'description_en' => "05 Workouts  for True Beast",
            'image' => "3.jfif",

        ]);


        Program::create([

            "name_ar" => "أساسيات الحفر",
            "name_en" => "Drill Essentials",
            'description_ar' => "05 تمارين للمبتدئين",
            'description_en' => "05 Workouts  for Beginner",
            'image' => "4.jfif",

        ]);
    }
}
