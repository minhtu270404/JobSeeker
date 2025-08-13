<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('candidate_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('headline');
            $table->text('summary')->nullable();
            $table->string('location')->nullable();
            $table->text('skills')->nullable();
            $table->unsignedBigInteger('resume_file_id')->nullable();
            $table->string('visibility')->default('public');
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('candidate_profiles');
    }
};
