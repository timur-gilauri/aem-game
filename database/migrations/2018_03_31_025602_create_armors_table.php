<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');

            $table->string('group');      // Группа брони: слабое. среднее, мощное и т.д.
            $table->string('category');   // Категория оружия: легкая броня, тяжелая броня
            $table->integer('defense');   // Урон оружия
            $table->integer('endurance'); // Запас прочности
            /* изображение */
            $table->string('image_file_name');
            $table->integer('image_file_size');
            $table->string('image_content_type');
            $table->timestamp('image_updated_at');

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
        Schema::dropIfExists('armors');
    }
}
