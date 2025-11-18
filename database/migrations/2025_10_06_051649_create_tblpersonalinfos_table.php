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
        Schema::create('tblpersonalinfos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('application_type');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('name_status', ['yes', 'no'])->default('yes');
            $table->json('previous_names')->nullable();
            $table->string('birth_month')->nullable();
            $table->string('birth_day')->nullable();
            $table->string('birth_year')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('birth_country')->nullable();
            $table->string('birth_state')->nullable();
            $table->string('birth_city')->nullable();
            $table->integer('height_ft')->nullable();
            $table->integer('height_in')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->default('pending');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tblpersonalinfos');
    }
};
