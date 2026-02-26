<?php

namespace App\Filament\Resources\HomeProcessSections;

use App\Filament\Resources\HomeProcessSections\Pages;
use App\Filament\Resources\HomeProcessSections\Schemas\HomeProcessSectionForm;
use App\Filament\Resources\HomeProcessSections\Tables\HomeProcessSectionsTable;
use App\Models\HomeProcessSection;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeProcessSectionResource extends Resource
{
    protected static ?string $model = HomeProcessSection::class;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-list-bullet';
    }

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return 'Landing';
    }

    public static function getModelLabel(): string
    {
        return 'منهجية العمل';
    }

    public static function getPluralModelLabel(): string
    {
        return 'منهجية العمل';
    }

    public static function form(Schema $schema): Schema
    {
        return HomeProcessSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeProcessSectionsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeProcessSections::route('/'),
            'create' => Pages\CreateHomeProcessSection::route('/create'),
            'edit'   => Pages\EditHomeProcessSection::route('/{record}/edit'),
        ];
    }
}