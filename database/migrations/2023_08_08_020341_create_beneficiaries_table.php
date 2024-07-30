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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->enum('ext_name', ['JR','SR','I', 'II', 'III','IV','V','VI']);
            $table->string('province_c');
            $table->string('citymun_c');
            $table->string('brgy_c');
            $table->date('bday');
            $table->enum('civil_status', ['Single', 'Married', 'Separated', 'Widowed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
