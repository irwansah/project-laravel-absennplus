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
        Schema::create('leave__approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('LeaveRequestId')->references('id')->on('leave__requests')->onDelete('cascade');
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
        Schema::dropIfExists('leave__approvals');
    }
};
