<?php

namespace App\Filament\Resources\HomeProjectTypes;

use App\Filament\Resources\HomeProjectTypes\Pages;
use App\Filament\Resources\HomeProjectTypes\Schemas\HomeProjectTypeForm;
use App\Filament\Resources\HomeProjectTypes\Tables\HomeProjectTypesTable;
use App\Models\HomeProjectType;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeProjectTypeResource extends Resource
{
    protected static ?string $model = HomeProjectType::class;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-tag';
    }

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return 'Landing';
    }

    public static function getModelLabel(): string
    {
        return 'نوع مشروع';
    }

    public static function getPluralModelLabel(): string
    {
        return 'أنواع المشاريع';
    }

    public static function form(Schema $schema): Schema
    {
        return HomeProjectTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeProjectTypesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeProjectTypes::route('/'),
            'create' => Pages\CreateHomeProjectType::route('/create'),
            'edit'   => Pages\EditHomeProjectType::route('/{record}/edit'),
        ];
    }
}