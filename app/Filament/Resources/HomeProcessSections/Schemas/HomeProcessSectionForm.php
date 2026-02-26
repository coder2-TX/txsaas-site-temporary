<?php

namespace App\Filament\Resources\HomeProcessSections\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class HomeProcessSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Grid::make(2)->schema([
                Toggle::make('is_active')
                    ->label('تفعيل التخصيص')
                    ->default(true),

                Textarea::make('subtitle')
                    ->label('النص تحت العنوان')
                    ->rows(2)
                    ->helperText('إذا تركته فارغًا سيظهر النص الافتراضي.'),
            ]),

            Grid::make(2)->schema([
                TextInput::make('s1_title')->label('عنوان خطوة 1'),
                Textarea::make('s1_desc')->label('وصف خطوة 1')->rows(2),

                TextInput::make('s2_title')->label('عنوان خطوة 2'),
                Textarea::make('s2_desc')->label('وصف خطوة 2')->rows(2),

                TextInput::make('s3_title')->label('عنوان خطوة 3'),
                Textarea::make('s3_desc')->label('وصف خطوة 3')->rows(2),

                TextInput::make('s4_title')->label('عنوان خطوة 4'),
                Textarea::make('s4_desc')->label('وصف خطوة 4')->rows(2),

                TextInput::make('s5_title')->label('عنوان خطوة 5'),
                Textarea::make('s5_desc')->label('وصف خطوة 5')->rows(2),
            ]),
        ]);
    }
}