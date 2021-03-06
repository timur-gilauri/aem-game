<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('type');                 // Тип аксессуара: кольцо, ожерелье и т.д.

            $table->string('scale');                // Единица измерения действия. Может быть: "percent", "absolute"
            $table->string('group');                // Группа эликсира: лечение, урон
            $table->string('for');                  // Параметр, на который действует эликсир
            $table->integer('action');              // Действие. Может быть up(уменьшает параметр), down(увеличивает)
            $table->integer('price');               // Цена
            $table->integer('value');               // Сила эликсира - в абсолютных единицах

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
        Schema::dropIfExists('accessories');
    }
}
