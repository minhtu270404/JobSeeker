<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('phone')->nullable()->index(); 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name')->nullable()->index();
            $table->string('last_name')->nullable()->index();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('gender', 10)->nullable()->index();
            $table->date('birthday')->nullable()->index();
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('is_delete')->default(false)->index();
            $table->string('group_role')->nullable()->index();

            $table->string('otp_code')->nullable()->index();
            $table->timestamp('otp_expires_at')->nullable()->index();
            $table->integer('otp_attempts')->default(0);
            $table->string('otp_context')->nullable();

            $table->string('last_login_ip', 45)->nullable();
            $table->timestamp('last_login_at')->nullable()->index();
            $table->rememberToken();
            $table->timestamps();

      
            $table->index(['first_name', 'last_name']);
            $table->index(['is_active', 'is_delete']);
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
