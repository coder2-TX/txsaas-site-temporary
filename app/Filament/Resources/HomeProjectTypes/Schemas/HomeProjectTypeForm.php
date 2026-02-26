<?php

namespace App\Filament\Resources\HomeProjectTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class HomeProjectTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Grid::make(2)->schema([
                TextInput::make('sort_order')
                    ->label('الترتيب')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->label('مفعل')
                    ->default(true),
            ]),

            Grid::make(2)->schema([
                TextInput::make('value')
                    ->label('القيمة (value)')
                    ->required()
                    ->maxLength(50)
                    ->helperText('مثال: saas / system / mobile / api'),

                TextInput::make('label')
                    ->label('الاسم الظاهر')
                    ->required()
                    ->maxLength(80),
            ]),
        ]);
    }
}