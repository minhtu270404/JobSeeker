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
         Schema::create('api_logs', function (Blueprint $table) {
            $table->bigIncrements('id'); 

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete(); 

            $table->string('ip', 45)->nullable(); 
            $table->string('method', 10); 
            $table->string('url', 2048); 
            $table->json('payload')->nullable(); 
            $table->integer('status_code'); 
            $table->integer('duration')->nullable(); 

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_logs');
    }
};
