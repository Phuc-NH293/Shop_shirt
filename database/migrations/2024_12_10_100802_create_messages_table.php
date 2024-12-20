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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Người gửi
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade'); // Người nhận
            $table->text('message'); // Nội dung tin nhắn
            $table->enum('sender_role', ['thanhVien', 'nhanVien', 'quanTriVien']); // Vai trò người gửi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};