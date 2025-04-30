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
        Schema::create('overtime__approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('OvtRequestId')->references('id')->on('overtime__requests')->onDelete('cascade');
            $table->dateTime('ApprovalDate');
            $table->string('reason')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->integer('postBy')->nullable();
            $table->dateTime('postDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overtime__approvals');
    }
};
