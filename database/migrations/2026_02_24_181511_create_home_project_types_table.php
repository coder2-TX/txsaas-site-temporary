<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_project_types', function (Blueprint $table) {
            $table->id();

            $table->unsignedSmallInteger('sort_order')->default(0)->index();
            $table->boolean('is_active')->default(true);

            // value = القيمة داخل <option value="...">
            $table->string('value')->nullable(); // saas, system...
            // label = النص الظاهر للمستخدم
            $table->string('label')->nullable(); // منصة SaaS...

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_project_types');
    }
};