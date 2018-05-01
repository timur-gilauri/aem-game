<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElixirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elixirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');

            $table->string('action_direction');                 // Направление действия. Может быть up(увеличивает параметр), down(уменьшает)
            $table->integer('value');                           // Сила эликсира - в абсолютных единицах
            $table->string('scale');                            // Единица измерения действия. Может быть: "percent", "absolute"
            $table->string('target_param');                        // Параметр, на который действует эликсир
            $table->integer('price');                           // Цена

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
        Schema::dropIfExists('elixirs');
    }
}
