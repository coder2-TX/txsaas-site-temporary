<?php

namespace App\Filament\Resources\HomeProcessSections\Pages;

use App\Filament\Resources\HomeProcessSections\HomeProcessSectionResource;
use Filament\Resources\Pages\EditRecord;

class EditHomeProcessSection extends EditRecord
{
    protected static string $resource = HomeProcessSectionResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}