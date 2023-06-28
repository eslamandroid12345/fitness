<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('sets')->comment('المجاميع');
            $table->string('reps')->comment('العداد');
            $table->string('muscle_name_ar')->comment('اسم العضله');
            $table->string('muscle_name_en');
            $table->string('exercise_type_ar');
            $table->string('exercise_type_en')->comment('نوع التمرينه');
            $table->longText('description_ar');
            $table->longText('description_en');
            $table->longText('video_url')->comment('مسار فيديو التمرين');
            $table->string('video_minute');
            $table->unsignedBigInteger('day_id');
            $table->foreign('day_id')->references('id')->on('days')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercises');
    }
}
