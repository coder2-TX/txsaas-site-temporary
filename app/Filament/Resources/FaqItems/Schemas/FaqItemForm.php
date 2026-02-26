<?php

namespace App\Filament\Resources\FaqItems\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class FaqItemForm
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

            TextInput::make('question')
                ->label('السؤال')
                ->required()
                ->maxLength(255),

            Textarea::make('answer')
                ->label('الإجابة')
                ->required()
                ->rows(4),
        ]);
    }
}