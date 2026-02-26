<?php

namespace App\Filament\Resources\HomeProjectTypes\Pages;

use App\Filament\Resources\HomeProjectTypes\HomeProjectTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeProjectTypes extends ListRecords
{
    protected static string $resource = HomeProjectTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
