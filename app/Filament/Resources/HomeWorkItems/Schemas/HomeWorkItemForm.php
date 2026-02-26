<?php

namespace App\Filament\Resources\HomeWorkItems\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class HomeWorkItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Grid::make(2)->schema([
                TextInput::make('sort_order')
                    ->label('الترتيب')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->label('مفعل')
                    ->default(true),
            ]),

            Grid::make(2)->schema([
                TextInput::make('tag')
                    ->label('Tag (مثل: SaaS / Business / Mobile)')
                    ->maxLength(50),

                FileUpload::make('icon_path')
                    ->label('أيقونة (صورة بأي صيغة)')
                    ->disk('public')
                    ->directory('landing/work')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->acceptedFileTypes(['image/svg+xml','image/png','image/jpeg','image/webp'])
                    ->openable()
                    ->downloadable()
                    ->helperText('إذا تركتها فارغة سيستخدم الموقع أيقونة افتراضية.'),
            ]),

            TextInput::make('title')
                ->label('عنوان الكرت')
                ->maxLength(255),

            Textarea::make('description')
                ->label('وصف الكرت')
                ->rows(2),

            Grid::make(3)->schema([
                TextInput::make('meta1')->label('خيار 1')->maxLength(50),
                TextInput::make('meta2')->label('خيار 2')->maxLength(50),
                TextInput::make('meta3')->label('خيار 3')->maxLength(50),
            ]),
        ]);
    }
}