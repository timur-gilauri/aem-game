<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCountriesTableAddArmsShadow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            /* изображение */
            $table->string('arms_shadow_file_name')->nullable();
            $table->integer('arms_shadow_file_size')->nullable();
            $table->string('arms_shadow_content_type')->nullable();
            $table->timestamp('arms_shadow_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            /* изображение */
            $table->dropColumn('arms_shadow_file_name');
            $table->dropColumn('arms_shadow_file_size');
            $table->dropColumn('arms_shadow_content_type');
            $table->dropColumn('arms_shadow_updated_at');
        });
    }
}
