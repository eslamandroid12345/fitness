<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Seeder;

class WeekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //program 1

        Week::create([

            'name_ar' => 'الاسبوع الاول',
            'name_en' => 'Week 1',
            'program_id' => 1,


        ]);

        Week::create([

            'name_ar' => 'الاسبوع التاني',
            'name_en' => 'Week 2',
            'program_id' => 1,

        ]);


        Week::create([
            'name_ar' => 'الاسبوع التالت',
            'name_en' => 'Week 3',
            'program_id' => 1,

        ]);

        Week::create([

            'name_ar' => 'الاسبوع الرابع',
            'name_en' => 'week 4',
            'program_id' => 1,

        ]);

        //program 2

        Week::create([

            'name_ar' => 'الاسبوع الاول',
            'name_en' => 'Week 1',
            'program_id' => 2,


        ]);

        Week::create([

            'name_ar' => 'الاسبوع التاني',
            'name_en' => 'Week 2',
            'program_id' => 2,

        ]);


        Week::create([
            'name_ar' => 'الاسبوع التالت',
            'name_en' => 'Week 3',
            'program_id' => 2,

        ]);

        Week::create([

            'name_ar' => 'الاسبوع الرابع',
            'name_en' => 'Week 4',
            'program_id' => 2,

        ]);

        //program 3
        Week::create([

            'name_ar' => 'الاسبوع الاول',
            'name_en' => 'Week 1',
            'program_id' => 3,


        ]);

        Week::create([

            'name_ar' => 'الاسبوع التاني',
            'name_en' => 'Week 2',
            'program_id' => 3,

        ]);


        Week::create([
            'name_ar' => 'الاسبوع التالت',
            'name_en' => 'Week 3',
            'program_id' => 3,

        ]);

        Week::create([

            'name_ar' => 'الاسبوع الرابع',
            'name_en' => 'Week 4',
            'program_id' => 3,

        ]);


        //program 4
        Week::create([

            'name_ar' => 'الاسبوع الاول',
            'name_en' => 'Week 1',
            'program_id' => 4,


        ]);

        Week::create([

            'name_ar' => 'الاسبوع التاني',
            'name_en' => 'Week 2',
            'program_id' => 4,

        ]);


        Week::create([
            'name_ar' => 'الاسبوع التالت',
            'name_en' => 'Week 3',
            'program_id' => 4,

        ]);

        Week::create([

            'name_ar' => 'الاسبوع الرابع',
            'name_en' => 'Week 4',
            'program_id' => 4,

        ]);
    }
}
