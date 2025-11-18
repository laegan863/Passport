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
        Schema::create('tblpassportdetails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('order_id')->constrained('tblpersonalinfos')->onDelete('cascade');
            $table->string('book_fullname')->nullable();
            $table->string('book_number')->nullable();
            $table->date('book_issue')->nullable();
            $table->date('book_expiry')->nullable();
            $table->enum('book_name_change', ['yes', 'no'])->default('no');
            $table->enum('change_reason', ['Marriage', 'Court Order'])->nullable();
            $table->json('prev_name')->nullable();
            $table->string('place_name_change')->nullable();
            $table->date('date_name_change')->nullable();

            $table->enum('card_applied', ['yes', 'no'])->default('no');
            $table->string('card_fullname')->nullable();
            $table->string('card_number')->nullable();
            $table->date('card_issue')->nullable();
            $table->date('card_expiry')->nullable();
            $table->enum('card_status', ['Stolen', 'Lost', 'Expired'])->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tblpassportdetails');
    }
};
