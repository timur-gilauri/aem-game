<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');         // Название города
            $table->string('description');  // Описание города
            $table->integer('country_id');  // id страны, на территории которой находится этот город
            $table->string('country_name'); // Название страны, на территории которой находится этот город

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
        Schema::dropIfExists('cities');
    }
}
