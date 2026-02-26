<?php

namespace App\Filament\Resources\HomeProjectTypes\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeProjectTypesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([
                TextColumn::make('sort_order')->label('ترتيب')->sortable(),
                TextColumn::make('value')->label('value')->searchable(),
                TextColumn::make('label')->label('الاسم')->searchable()->wrap(),
                ToggleColumn::make('is_active')->label('مفعل'),
                TextColumn::make('updated_at')->label('آخر تعديل')->dateTime('Y-m-d H:i')->sortable(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ]);
    }
}