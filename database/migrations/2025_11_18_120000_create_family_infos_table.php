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
        Schema::create('family_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('tblpersonalinfos')->onDelete('cascade');

            $table->string('marital_status');

            // Mother
            $table->boolean('mother_unknown')->default(false);
            $table->string('mother_firstname')->nullable();
            $table->string('mother_middlename')->nullable();
            $table->string('mother_lastname')->nullable();
            $table->date('mother_dob')->nullable();
            $table->string('mother_us_citizen', 5)->nullable();
            $table->string('mother_country')->nullable();
            $table->string('mother_city')->nullable();

            // Father
            $table->boolean('father_unknown')->default(false);
            $table->string('father_firstname')->nullable();
            $table->string('father_middlename')->nullable();
            $table->string('father_lastname')->nullable();
            $table->date('father_dob')->nullable();
            $table->string('father_us_citizen', 5)->nullable();
            $table->string('father_country')->nullable();
            $table->string('father_city')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_infos');
    }
};
