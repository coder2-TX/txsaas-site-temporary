<?php

namespace App\Filament\Resources\HomeProcessSections\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeProcessSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#')->sortable(),
                ToggleColumn::make('is_active')->label('تفعيل التخصيص'),
                TextColumn::make('updated_at')->label('آخر تعديل')->dateTime('Y-m-d H:i')->sortable(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ]);
    }
}