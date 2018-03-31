<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('locations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('parent_location_id');
                $table->string('title');
                $table->string('title_displayed');
                $table->integer('available_at_level');

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
            Schema::dropIfExists('locations');
        }
    }
