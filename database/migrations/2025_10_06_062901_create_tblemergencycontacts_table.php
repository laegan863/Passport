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
        Schema::create('tblemergencycontacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('order_id')->constrained('tblpersonalinfos')->onDelete('cascade');
            // Relationship to Applicant
            $table->string('relationship')->nullable();

            // Contact Email
            $table->string('email')->nullable();

            // Names
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();

            // Contact Number
            $table->string('contact_number')->nullable();
            $table->string('phone_type')->nullable(); // Home, Work, Cellphone, Other

            // Address Fields
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('apartment')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblemergencycontacts');
    }
};
