<?php

namespace App\Filament\Resources\HomeContactSettings\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class HomeContactSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ToggleColumn::make('is_active')->label('تفعيل التخصيص'),
                TextColumn::make('email')->label('البريد')->wrap(),
                TextColumn::make('whatsapp')->label('واتساب')->wrap(),
                TextColumn::make('updated_at')->label('آخر تعديل')->dateTime('Y-m-d H:i')->sortable(),
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
            ]);
    }
}