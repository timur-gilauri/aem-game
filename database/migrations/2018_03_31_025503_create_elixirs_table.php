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
                $table->string('name');
                $table->string('description');

                $table->integer('action_type');                     // Действие. Может быть up(уменьшает параметр), down(увеличивает)
                $table->integer('price');                           // Цена

                $table->integer('value');                           // Сила эликсира - в абсолютных единицах
                $table->string('scale');                            // Единица измерения действия. Может быть: "percent", "absolute"
                $table->string('group');                            // Группа эликсира: лечение, урон
                $table->string('for_param');                        // Параметр, на который действует эликсир
                $table->string('size');                             // Размер эликсира - малый, средний, большой

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
            Schema::dropIfExists('elixirs');
        }
    }
