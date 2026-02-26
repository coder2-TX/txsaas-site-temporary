<?php

namespace App\Filament\Resources\HomeWhySections\Pages;

use App\Filament\Resources\HomeWhySections\HomeWhySectionResource;
use Filament\Resources\Pages\EditRecord;

class EditHomeWhySection extends EditRecord
{
    protected static string $resource = HomeWhySectionResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}