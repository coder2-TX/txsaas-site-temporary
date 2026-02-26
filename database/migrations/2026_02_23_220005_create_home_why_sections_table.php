<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_why_sections', function (Blueprint $table) {
            $table->id();

            // ✅ تفعيل التخصيص (مثل خدماتك)
            $table->boolean('is_active')->default(true);

            // النص تحت "لماذا TX-SaaS؟"
            $table->text('subtitle')->nullable();

            // 4 bullets (عنوان + وصف)
            $table->string('b1_title')->nullable();
            $table->text('b1_desc')->nullable();

            $table->string('b2_title')->nullable();
            $table->text('b2_desc')->nullable();

            $table->string('b3_title')->nullable();
            $table->text('b3_desc')->nullable();

            $table->string('b4_title')->nullable();
            $table->text('b4_desc')->nullable();

            // checklist (5 عناصر)
            $table->string('c1')->nullable();
            $table->string('c2')->nullable();
            $table->string('c3')->nullable();
            $table->string('c4')->nullable();
            $table->string('c5')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_why_sections');
    }
};