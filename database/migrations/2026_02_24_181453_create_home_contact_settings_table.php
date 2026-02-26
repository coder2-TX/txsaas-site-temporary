<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_contact_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true); // تفعيل التخصيص
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable(); // رقم عرض (مثال: +967 7xx xxx xxx)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_contact_settings');
    }
};