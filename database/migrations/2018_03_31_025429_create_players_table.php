<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('city_id');
            $table->integer('nation_id');
            $table->integer('country_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('description');
            $table->string('class_action');             // Действие класса
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
        Schema::dropIfExists('players');
    }
}
