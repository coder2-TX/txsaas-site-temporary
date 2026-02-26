<?php

namespace App\Filament\Resources\HomeProcessSections\Pages;

use App\Filament\Resources\HomeProcessSections\HomeProcessSectionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeProcessSection extends CreateRecord
{
    protected static string $resource = HomeProcessSectionResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}