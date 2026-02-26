<?php

namespace App\Filament\Resources\AdminUsers;

use App\Filament\Resources\AdminUsers\Pages;
use App\Filament\Resources\AdminUsers\Schemas\AdminUserForm;
use App\Filament\Resources\AdminUsers\Tables\AdminUsersTable;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AdminUserResource extends Resource
{
    protected static ?string $model = User::class;

    // ✅ يظهر تحت Dashboard (بدون Group) وبترتيب مبكر
    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return null;
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-user-circle';
    }

    public static function getModelLabel(): string
    {
        return 'حساب الدخول';
    }

    public static function getPluralModelLabel(): string
    {
        return 'حساب الدخول';
    }

    // ✅ رابط القائمة يفتح صفحة تعديل المستخدم الحالي مباشرة
    public static function getNavigationUrl(): string
    {
        $id = auth()->id();
        return $id ? static::getUrl('edit', ['record' => $id]) : static::getUrl('index');
    }

    // ✅ منع الإضافة نهائيًا
    public static function canCreate(): bool
    {
        return false;
    }

    // ✅ حصر الاستعلام على المستخدم الحالي فقط (سجل واحد)
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $id = auth()->id();
        if (!$id) {
            return $query->whereRaw('1=0');
        }

        return $query->whereKey($id);
    }

    public static function form(Schema $schema): Schema
    {
        return AdminUserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdminUsersTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdminUsers::route('/'),
            'edit'  => Pages\EditAdminUser::route('/{record}/edit'),
        ];
    }
}