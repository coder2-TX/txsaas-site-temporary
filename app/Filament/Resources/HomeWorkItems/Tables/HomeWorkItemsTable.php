<?php

namespace App\Filament\Resources\HomeWorkItems\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeWorkItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([
                TextColumn::make('sort_order')->label('ترتيب')->sortable(),
                TextColumn::make('tag')->label('Tag')->searchable(),
                TextColumn::make('title')->label('العنوان')->searchable()->wrap(),
                ToggleColumn::make('is_active')->label('مفعل'),
                TextColumn::make('updated_at')->label('آخر تعديل')->dateTime('Y-m-d H:i')->sortable(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ]);
    }
}