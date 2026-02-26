<?php

namespace App\Filament\Resources\HomeWorkItems\Pages;

use App\Filament\Resources\HomeWorkItems\HomeWorkItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeWorkItems extends ListRecords
{
    protected static string $resource = HomeWorkItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
