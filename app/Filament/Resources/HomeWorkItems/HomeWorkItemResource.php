<?php

namespace App\Filament\Resources\HomeWorkItems;

use App\Filament\Resources\HomeWorkItems\Pages;
use App\Filament\Resources\HomeWorkItems\Schemas\HomeWorkItemForm;
use App\Filament\Resources\HomeWorkItems\Tables\HomeWorkItemsTable;
use App\Models\HomeWorkItem;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HomeWorkItemResource extends Resource
{
    protected static ?string $model = HomeWorkItem::class;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-briefcase';
    }

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return 'Landing';
    }

    public static function getModelLabel(): string
    {
        return 'عمل (نموذج)';
    }

    public static function getPluralModelLabel(): string
    {
        return 'أعمال عامة (نماذج)';
    }

    public static function form(Schema $schema): Schema
    {
        return HomeWorkItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeWorkItemsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHomeWorkItems::route('/'),
            'create' => Pages\CreateHomeWorkItem::route('/create'),
            'edit'   => Pages\EditHomeWorkItem::route('/{record}/edit'),
        ];
    }
}