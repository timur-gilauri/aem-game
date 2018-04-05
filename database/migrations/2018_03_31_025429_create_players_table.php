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
            $table->string('name');

            /* Характеристики персонажа */
            $table->integer('nation_id');                       // id Расы, которую выбрал пользователь
            $table->integer('city_id');                         // id Города, в котором находится пользователь
            $table->integer('country_id');                      // id Страны, в которой находится пользователь
            $table->integer('player_class_id');                 // id Класса, который выбрал пользователь

            /* Основные характеристики  персонажа */
            $table->integer('level');                           // Уровень
            $table->integer('experience');                      // Опыт
            $table->integer('health');                          // Здоровье
            $table->integer('power');                           // Сумма показателей - определяет силу игрока
            $table->integer('damage');                          // Общий урон
            $table->integer('defense');                         // Общая защита
            $table->integer('agility');                         // Ловкость
            $table->integer('money');                           // Деньги
            /* Навыки владения оружием */
            $table->integer('swords');                          // Мечи
            $table->integer('bows');                            // Луки
            $table->integer('axes');                            // Топоры
            $table->integer('daggers');                         // Кинжалы
            $table->integer('hands');                           // Рукопашный бой
            /* Навыки владения броней */
            $table->integer('heavy_armor');                     // Тяжелая броня
            $table->integer('light_armor');                     // Легкая броня
            /* Активные вещи */
            $table->integer('active_weapon_id')->nullable();                // id активного оружия
            $table->integer('active_armor_id')->nullable();                 // id активной брони
            $table->integer('left_hand_accessory_id')->nullable();          // id кольца на левой руке
            $table->integer('right_hand_accessory_id')->nullable();         // id кольца на правой руке
            $table->integer('neck_accessory_id')->nullable();               // id аксесуара на шее
            $table->integer('active_elixir_id')->nullable();                // id использованного эликсира. Например, перед боем
            /* Дополнительные параметры */
            $table->string('restoring')->default(0);                        // Индикатор того, что игрок в процессе восстановления здоровья

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
        Schema::dropIfExists('players');
    }
}
