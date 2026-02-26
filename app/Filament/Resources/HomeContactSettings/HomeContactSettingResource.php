<?php

namespace App\Filament\Resources\HomeContactSettings;

use App\Filament\Resources\HomeContactSettings\Pages;
use App\Filament\Resources\HomeContactSettings\Schemas\HomeContactSettingForm;
use App\Filament\Resources\HomeContactSettings\Tables\HomeContactSettingsTable;
use App\Models\HomeContactSetting;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeContactSettingResource extends Resource
{
    protected static ?string $model = HomeContactSetting::class;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-envelope';
    }

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return 'Landing';
    }

    public static function getModelLabel(): string
    {
        return 'بيانات التواصل';
    }

    public static function getPluralModelLabel(): string
    {
        return 'بيانات التواصل';
    }

    public static function form(Schema $schema): Schema
    {
        return HomeContactSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeContactSettingsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeContactSettings::route('/'),
            'create' => Pages\CreateHomeContactSetting::route('/create'),
            'edit'   => Pages\EditHomeContactSetting::route('/{record}/edit'),
        ];
    }
}