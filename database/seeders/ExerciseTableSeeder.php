<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Seeder;

class ExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        for ($i=1;$i <= 80;$i++){

            for ($j=1;$j<=4;$j++){

                Exercise::create([

                    'name_ar' => "تسخين",
                    'name_en' => "Warm-up",
                    'sets' => "4",
                    'reps' => "15-12-10-10",
                    'muscle_name_ar' => "عضله الترابيزيوس",
                    'muscle_name_en' => "Trapezius muscle",
                    'exercise_type_ar' => "بناء الأجسام",
                    'exercise_type_en' => "Bodybuilding",
                    'description_ar' => "تخلص من دهون البطن ، واحصل على عضلات بطن ممزقة في 4 أسابيع فقط مع هذه الخطة الفعالة. كما أنه يساعد في رفع الذراع وتقوية ظهرك وكتفيك. لا حاجة للمعدات",
                    'description_en' => "Lose belly fat, get ripped abs in just 4 weeks with this effcient plan. Its also helps pump ups arm, strengthen your back & shoulders. No equipment needed",
                    'video_url' => "video-1",
                    'video_minute' => "1:50",
                    'day_id' => 1
                ]);
            }
        }





    }
}
