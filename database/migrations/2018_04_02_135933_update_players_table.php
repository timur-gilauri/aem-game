<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->string('name')->after('user_id');
            $table->integer('active_weapon_id')->nullable()->change();
            $table->integer('active_armor_id')->nullable()->change();
            $table->integer('left_hand_accessory_id')->nullable()->change();
            $table->integer('right_hand_accessory_id')->nullable()->change();
            $table->integer('neck_accessory_id')->nullable()->change();
            $table->integer('active_elixir_id')->nullable()->change();
            $table->integer('restoring')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
