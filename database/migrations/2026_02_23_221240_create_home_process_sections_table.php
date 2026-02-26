<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_process_sections', function (Blueprint $table) {
            $table->id();

            $table->boolean('is_active')->default(true);

            $table->text('subtitle')->nullable();

            $table->string('s1_title')->nullable();
            $table->text('s1_desc')->nullable();

            $table->string('s2_title')->nullable();
            $table->text('s2_desc')->nullable();

            $table->string('s3_title')->nullable();
            $table->text('s3_desc')->nullable();

            $table->string('s4_title')->nullable();
            $table->text('s4_desc')->nullable();

            $table->string('s5_title')->nullable();
            $table->text('s5_desc')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_process_sections');
    }
};