<?php

namespace App\Filament\Resources\HomeContactSettings\Pages;

use App\Filament\Resources\HomeContactSettings\HomeContactSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeContactSettings extends ListRecords
{
    protected static string $resource = HomeContactSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
