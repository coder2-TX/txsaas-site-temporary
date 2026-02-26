<?php

namespace App\Filament\Resources\HomeHeroes\Pages;

use App\Filament\Resources\HomeHeroes\HomeHeroResource;
use Filament\Resources\Pages\EditRecord;

class EditHomeHero extends EditRecord
{
    protected static string $resource = HomeHeroResource::class;

    protected function getHeaderActions(): array
    {
        return []; // بدون حذف
    }

    /**
     * ✅ بعد الحفظ يرجع إلى صفحة الريسورس الرئيسية (List)
     */
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    /**
     * ✅ احتياط إضافي (بعض الإصدارات تستخدم هذا بعد الحفظ)
     */
    protected function getRedirectUrlAfterSave(): string
    {
        return static::getResource()::getUrl('index');
    }
}