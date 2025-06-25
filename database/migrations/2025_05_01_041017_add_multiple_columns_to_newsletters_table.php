<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('newsletters', function (Blueprint $table) {
            $table->text('title')->nullable();
            $table->integer('type')->default(1);
            $table->timestamp('publish_date')->nullable();
            $table->text('slug')->nullable();
            $table->text('thumbnail')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newsletters', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'type',
                'publish_date',
                'slug',
                  'thumbnail'
            ]);
        });
    }
};
