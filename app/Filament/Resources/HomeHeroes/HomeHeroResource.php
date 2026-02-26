<?php

namespace App\Filament\Resources\HomeHeroes;

use App\Filament\Resources\HomeHeroes\Pages\EditHomeHero;
use App\Filament\Resources\HomeHeroes\Pages\ListHomeHeroes;
use App\Filament\Resources\HomeHeroes\Schemas\HomeHeroForm;
use App\Filament\Resources\HomeHeroes\Tables\HomeHeroesTable;
use App\Models\HomeHero;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeHeroResource extends Resource
{
    protected static ?string $model = HomeHero::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Home Hero';

    protected static ?string $modelLabel = 'Home Hero';

    protected static ?string $pluralModelLabel = 'Home Hero';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return HomeHeroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        // لن تُعرض غالبًا لأننا سنحوّل تلقائيًا لصفحة edit
        return HomeHeroesTable::configure($table);
    }

    public static function canCreate(): bool
    {
        return false; // ✅ سجل واحد فقط
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomeHeroes::route('/'),
            'edit'  => EditHomeHero::route('/{record}/edit'),
        ];
    }
}