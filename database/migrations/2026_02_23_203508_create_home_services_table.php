<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_services', function (Blueprint $table) {
            $table->id();

            // ثابت: 1..6
            $table->unsignedTinyInteger('position')->unique();

            $table->string('title')->nullable();
            $table->text('text')->nullable();

            // path داخل storage/public أو assets/... أو رابط https
            $table->string('icon_path')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_services');
    }
};