<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_work_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedSmallInteger('sort_order')->default(0)->index();
            $table->boolean('is_active')->default(true);

            $table->string('tag')->nullable();          // SaaS / Business / Mobile...
            $table->string('title')->nullable();        // عنوان الكرت
            $table->text('description')->nullable();    // وصف الكرت

            // صورة الأيقونة (storage/public أو assets/... أو رابط)
            $table->string('icon_path')->nullable();

            // 3 خيارات تحت الكرت
            $table->string('meta1')->nullable();
            $table->string('meta2')->nullable();
            $table->string('meta3')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_work_items');
    }
};