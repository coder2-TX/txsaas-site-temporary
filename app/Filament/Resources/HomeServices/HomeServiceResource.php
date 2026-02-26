<?php

namespace App\Filament\Resources\HomeServices;

use App\Filament\Resources\HomeServices\Pages;
use App\Filament\Resources\HomeServices\Schemas\HomeServiceForm;
use App\Filament\Resources\HomeServices\Tables\HomeServicesTable;
use App\Models\HomeService;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeServiceResource extends Resource
{
    protected static ?string $model = HomeService::class;

    // ✅ بدلاً من property (عشان نوعها عندك يسبب FatalError)
    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-squares-2x2';
    }

    // ✅ بدلاً من $navigationGroup property
    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return 'Landing';
    }

    public static function getModelLabel(): string
    {
        return 'خدمة';
    }

    public static function getPluralModelLabel(): string
    {
        return 'الخدمات';
    }

    // ✅ Filament v4 يستخدم Schema
    public static function form(Schema $schema): Schema
    {
        return HomeServiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeServicesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeServices::route('/'),
            'create' => Pages\CreateHomeService::route('/create'),
            'edit'   => Pages\EditHomeService::route('/{record}/edit'),
        ];
    }
}