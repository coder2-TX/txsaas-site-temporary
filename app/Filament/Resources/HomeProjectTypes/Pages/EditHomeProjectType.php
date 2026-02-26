<?php

namespace App\Filament\Resources\HomeProjectTypes\Pages;

use App\Filament\Resources\HomeProjectTypes\HomeProjectTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomeProjectType extends EditRecord
{
    protected static string $resource = HomeProjectTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
