<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');

            $table->integer('damage');                        // Урон оружия
            $table->integer('endurance');                    // Запас прочности
            $table->string('power_level');                    // Группа оружия: слабое. среднее, мощное и т.д.

            $table->string('type_id');                        // Тип оружия. железное, стальное и т.д.
            $table->string('weapon_category_id');            // Категория оружия: мечи, топоры, луки, кинжалы и т.д

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
        Schema::dropIfExists('weapons');
    }
}
