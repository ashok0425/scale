<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Permission::create([
            'name' => 'campaign',
            'guard' => 'web',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
