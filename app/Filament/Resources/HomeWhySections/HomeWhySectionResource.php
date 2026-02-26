<?php

namespace App\Filament\Resources\HomeWhySections;

use App\Filament\Resources\HomeWhySections\Pages;
use App\Filament\Resources\HomeWhySections\Schemas\HomeWhySectionForm;
use App\Filament\Resources\HomeWhySections\Tables\HomeWhySectionsTable;
use App\Models\HomeWhySection;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeWhySectionResource extends Resource
{
    protected static ?string $model = HomeWhySection::class;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-question-mark-circle';
    }

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return 'Landing';
    }

    public static function getModelLabel(): string
    {
        return 'لماذا TX-SaaS';
    }

    public static function getPluralModelLabel(): string
    {
        return 'لماذا TX-SaaS';
    }

    public static function form(Schema $schema): Schema
    {
        return HomeWhySectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeWhySectionsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeWhySections::route('/'),
            'create' => Pages\CreateHomeWhySection::route('/create'),
            'edit'   => Pages\EditHomeWhySection::route('/{record}/edit'),
        ];
    }
}