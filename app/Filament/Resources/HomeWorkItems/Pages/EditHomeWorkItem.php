<?php

namespace App\Filament\Resources\HomeWorkItems\Pages;

use App\Filament\Resources\HomeWorkItems\HomeWorkItemResource;
use Filament\Resources\Pages\EditRecord;

class EditHomeWorkItem extends EditRecord
{
    protected static string $resource = HomeWorkItemResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}