<?php

namespace App\Filament\Resources\HomeContactSettings\Pages;

use App\Filament\Resources\HomeContactSettings\HomeContactSettingResource;
use Filament\Resources\Pages\EditRecord;

class EditHomeContactSetting extends EditRecord
{
    protected static string $resource = HomeContactSettingResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}