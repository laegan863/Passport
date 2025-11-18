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
        Schema::create('tbltravelplans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('order_id')->constrained('tblpersonalinfos')->onDelete('cascade');
            $table->boolean('has_travel_plans')->default(false);
            $table->date('departure_date')->nullable();
            $table->date('return_date')->nullable();
            $table->boolean('no_return_date')->default(false);
            $table->json('travel_country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltravelplans');
    }
};
