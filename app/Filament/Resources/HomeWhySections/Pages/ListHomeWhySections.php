<?php

namespace App\Filament\Resources\HomeWhySections\Pages;

use App\Filament\Resources\HomeWhySections\HomeWhySectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeWhySections extends ListRecords
{
    protected static string $resource = HomeWhySectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
