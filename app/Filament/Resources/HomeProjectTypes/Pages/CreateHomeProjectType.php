<?php

namespace App\Filament\Resources\HomeProjectTypes\Pages;

use App\Filament\Resources\HomeProjectTypes\HomeProjectTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeProjectType extends CreateRecord
{
    protected static string $resource = HomeProjectTypeResource::class;

     protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
