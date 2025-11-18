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
        Schema::create('tblverifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('order_id')->constrained('tblpersonalinfos')->onDelete('cascade');
            $table->string('security_question');
            $table->string('answer');
            $table->string('ssn_encrypted');
            $table->string('ssn_repeat_encrypted');
            $table->boolean('consent_agreed')->default(false);
            $table->boolean('terms_agreed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblverifications');
    }
};
