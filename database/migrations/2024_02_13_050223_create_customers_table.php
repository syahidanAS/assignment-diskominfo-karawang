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
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('_id')->default(DB::raw('(UUID())'))->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nik');
            $table->date('birth_date');
            $table->longText('full_address');
            $table->uuid('created_by');
            $table->uuid('screening_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
