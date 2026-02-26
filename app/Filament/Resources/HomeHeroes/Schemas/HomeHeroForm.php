<?php

namespace App\Filament\Resources\HomeHeroes\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HomeHeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Textarea::make('hero_text')
                    ->label('نص الهيرو (الوصف تحت العنوان)')
                    ->rows(4)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}