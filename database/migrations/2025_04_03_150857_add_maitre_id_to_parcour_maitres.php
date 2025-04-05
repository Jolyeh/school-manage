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
        Schema::table('parcour_maitres', function (Blueprint $table) {
            //
            $table->foreignId('maitre_id')->constrained('maitres')->after('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parcour_maitres', function (Blueprint $table) {
            //
        });
    }
};
