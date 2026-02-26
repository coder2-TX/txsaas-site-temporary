<?php

namespace App\Filament\Resources\HomeWorkItems\Pages;

use App\Filament\Resources\HomeWorkItems\HomeWorkItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeWorkItem extends CreateRecord
{
    protected static string $resource = HomeWorkItemResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}