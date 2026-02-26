<?php

namespace App\Filament\Resources\AdminUsers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class AdminUserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Grid::make(2)->schema([
                TextInput::make('name')
                    ->label('الاسم')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('البريد')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
            ]),

            Grid::make(2)->schema([
                TextInput::make('password')
                    ->label('كلمة المرور الجديدة')
                    ->password()
                    ->autocomplete('new-password')
                    ->confirmed() // يتطلب password_confirmation
                    // ✅ لا يكتب كلمة المرور إذا تركتها فارغة
                    ->dehydrated(fn ($state) => filled($state))
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? $state : null),

                TextInput::make('password_confirmation')
                    ->label('تأكيد كلمة المرور')
                    ->password()
                    ->autocomplete('new-password')
                    ->dehydrated(false),
            ]),
        ]);
    }
}