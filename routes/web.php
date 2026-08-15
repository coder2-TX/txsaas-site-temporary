<?php

use Illuminate\Support\Facades\Route;
use App\Models\HomeHero;

Route::get('/', function () {
    // النص الافتراضي (يبقى موجود لو ما فيه بيانات)
    $defaultHeroText = 'من الفكرة إلى الإطلاق: تصميم واجهات، Backend، APIs، لوحة تحكم، واستضافة — مع بنية قابلة للتوسع وأمان أعلى.';

    try {
        // يجلب أول نص من الجدول (إن وجد)
        $heroText = HomeHero::query()->value('hero_text') ?: $defaultHeroText;
    } catch (\Throwable $e) {
        // لو الجدول غير موجود / مشكلة DB / قبل migrate
        $heroText = $defaultHeroText;
    }

    return view('landing.index', compact('heroText'));
})->name('landing');

// TX-SAAS V6 contact page
Route::view('/contact', 'landing.contact')->name('contact');
