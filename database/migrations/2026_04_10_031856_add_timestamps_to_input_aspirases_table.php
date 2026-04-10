<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('input_aspirases', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable()->after('keterangan');
            $table->timestamp('updated_at')->nullable()->after('created_at');
        });

        DB::table('input_aspirases')->whereNull('created_at')->update([
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('input_aspirases', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });
    }
};
