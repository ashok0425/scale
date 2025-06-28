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
        Schema::table('cms', function (Blueprint $table) {
            $table->integer('blog')->default(1);
            $table->integer('freelancer')->default(1);
            $table->integer('founder')->default(1);
            $table->integer('investor')->default(1);
            $table->integer('priority')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms', function (Blueprint $table) {
            $table->dropColumn([
                'blog',
                'freelancer',
                'founder',
                'investor',
                'priority'
            ]);
        });
    }
};
