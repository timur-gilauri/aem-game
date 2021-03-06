<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('class_action');             // Действие класса. Может быть permanent, at_level
            $table->string('scale');                    // Единицы измерения прибавки.

            /* Базовые характеристики */
            $table->integer('health_up');                // Здоровье
            $table->integer('power_up');                // Общий урон
            $table->integer('guard_up');                // Общая защита
            $table->integer('agility_up');            // Ловкость
            $table->integer('money_up');                // Деньги
            /* Навыки владения оружием */
            $table->integer('swords_up');                // Мечи
            $table->integer('bows_up');                // Луки
            $table->integer('axes_up');                // Топоры
            $table->integer('daggers_up');            // Кинжалы
            /* Навыки владения броней */
            $table->integer('heavy_armor_up');        // Тяжелая броня
            $table->integer('light_armor_up');        // Легкая броня

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
        Schema::dropIfExists('player_classes');
    }
}
