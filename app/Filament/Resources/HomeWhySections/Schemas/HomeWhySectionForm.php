<?php

namespace App\Filament\Resources\HomeWhySections\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class HomeWhySectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Grid::make(2)->schema([
                Toggle::make('is_active')
                    ->label('تفعيل التخصيص')
                    ->default(true),

                Textarea::make('subtitle')
                    ->label('النص تحت العنوان الرئيسي')
                    ->rows(2)
                    ->helperText('إذا تركته فارغًا سيظهر النص الافتراضي.'),
            ]),

            // Bullets (4)
            Grid::make(2)->schema([
                TextInput::make('b1_title')->label('عنوان 1'),
                Textarea::make('b1_desc')->label('وصف 1')->rows(2),

                TextInput::make('b2_title')->label('عنوان 2'),
                Textarea::make('b2_desc')->label('وصف 2')->rows(2),

                TextInput::make('b3_title')->label('عنوان 3'),
                Textarea::make('b3_desc')->label('وصف 3')->rows(2),

                TextInput::make('b4_title')->label('عنوان 4'),
                Textarea::make('b4_desc')->label('وصف 4')->rows(2),
            ]),

            // Checklist (5)
            Grid::make(2)->schema([
                TextInput::make('c1')->label('نقطة 1'),
                TextInput::make('c2')->label('نقطة 2'),
                TextInput::make('c3')->label('نقطة 3'),
                TextInput::make('c4')->label('نقطة 4'),
                TextInput::make('c5')->label('نقطة 5'),
            ]),
        ]);
    }
}