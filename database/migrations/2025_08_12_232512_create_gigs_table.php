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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->integer('price_cents')->nullable();
            $table->string('currency', 10)->default('USD');
            $table->text('deliverables')->nullable();
            $table->string('status', 50)->default('pending');
            $table->string('visibility', 50)->default('public');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('gigs');
    }
};
