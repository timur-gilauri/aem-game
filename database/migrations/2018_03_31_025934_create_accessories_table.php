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
                $table->string('name');
                $table->string('description');

                $table->string('scale');    // Единица измерения действия. Может быть: "percent", "absolute"
                $table->string('group');    // Группа эликсира: лечение, урон
                $table->string('for');      // Параметр, на который действует эликсир
                $table->integer('action');  // Действие. Может быть up(уменьшает параметр), down(увеличивает)
                $table->integer('price');   // Цена
                $table->integer('value');   // Сила эликсира - в абсолютных единицах

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
            Schema::dropIfExists('accessories');
        }
    }
