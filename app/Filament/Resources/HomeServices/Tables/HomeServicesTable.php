<?php

namespace App\Filament\Resources\HomeServices\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('position', 'asc')
            ->columns([
                TextColumn::make('position')->label('#')->sortable(),
                TextColumn::make('title')->label('العنوان')->searchable()->wrap(),
                ToggleColumn::make('is_active')->label('مفعل'),
                TextColumn::make('updated_at')->label('آخر تعديل')->dateTime('Y-m-d H:i')->sortable(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ]);
    }
}