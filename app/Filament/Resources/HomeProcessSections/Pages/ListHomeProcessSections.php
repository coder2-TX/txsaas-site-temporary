<?php

namespace App\Filament\Resources\HomeProcessSections\Pages;

use App\Filament\Resources\HomeProcessSections\HomeProcessSectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeProcessSections extends ListRecords
{
    protected static string $resource = HomeProcessSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
