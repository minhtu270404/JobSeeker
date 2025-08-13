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
        Schema::create('gig_offers', function (Blueprint $table) {
            $table->id();
            
      
            $table->unsignedBigInteger('gig_id');
            $table->foreign('gig_id')->references('id')->on('gigs')->onDelete('cascade');


            $table->unsignedBigInteger('contractor_id');
            $table->foreign('contractor_id')->references('id')->on('contractors')->onDelete('cascade');

            $table->integer('proposed_price_cents')->nullable();
            $table->date('proposed_deadline')->nullable();
            $table->text('message')->nullable();
            $table->string('status', 50)->default('pending');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('gig_offers');
    }
};
