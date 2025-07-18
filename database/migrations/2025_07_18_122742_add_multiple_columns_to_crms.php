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
        Schema::table('crms', function (Blueprint $table) {
            $table->text('specialist')->nullable();
            $table->text('expertise')->nullable();
            $table->integer('show_on_frontend')->default(0);
            $table->text('what_excited')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crms', function (Blueprint $table) {
            $table->dropColumn([
                'what_excited',
                'show_on_frontend',
                'expertise',
                'specialist'
            ]);
        });
    }
};
