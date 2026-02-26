<?php

namespace App\Filament\Resources\HomeContactSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class HomeContactSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Grid::make(2)->schema([
                Toggle::make('is_active')
                    ->label('تفعيل التخصيص')
                    ->default(true),

                TextInput::make('email')
                    ->label('البريد')
                    ->email()
                    ->maxLength(255)
                    ->helperText('إذا تركته فارغًا سيظهر البريد الافتراضي في الموقع.'),
            ]),

            TextInput::make('whatsapp')
                ->label('واتساب (للعرض)')
                ->maxLength(60)
                ->helperText('مثال: +967 777 000 000 (إذا تركته فارغًا سيظهر الافتراضي).'),
        ]);
    }
}