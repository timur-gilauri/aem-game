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
            $table->string('title');
            $table->string('description');

            $table->integer('price');                   // Цена
            $table->integer('value');                       // Урон оружия
            $table->integer('endurance');                   // Запас прочности
            $table->string('category_id');                  // Категория оружия: слабое. среднее, мощное и т.д.
            $table->string('type');                         // Тип оружия: мечи, топоры, луки, кинжалы и т.д

            /* изображение */
            $table->string('image_file_name')->nullable();
            $table->integer('image_file_size')->nullable();
            $table->string('image_content_type')->nullable();
            $table->timestamp('image_updated_at')->nullable();

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
