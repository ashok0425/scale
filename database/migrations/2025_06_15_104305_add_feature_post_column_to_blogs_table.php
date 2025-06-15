<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->integer('feature_post')->nullable()->default(0);
            $table->integer('read_time')->nullable();
            $table->string('audio')->nullable();
            $table->string('author')->nullable();
            $table->string('author_post')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['feature_post','audio','read_time','author','author_post']);
        });
    }
};
