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
        Schema::create('tblcontactinfos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('order_id')->constrained('tblpersonalinfos')->onDelete('cascade');
            $table->string('primary_phone');
            $table->string('phone_type')->nullable();
            $table->json('additional_numbers')->nullable();
            $table->string('address_line1');
            $table->string('address_unit')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->boolean('same_mailing')->default(true);
            $table->string('mail_address_line1')->nullable();
            $table->string('mail_address_unit')->nullable();
            $table->string('mail_address_line2')->nullable();
            $table->string('mail_state')->nullable();
            $table->string('mail_city')->nullable();
            $table->string('mail_zip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcontactinfos');
    }
};
