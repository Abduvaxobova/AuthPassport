<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');;
            $table->string('passport_number');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('passpotrs');
    }
};
