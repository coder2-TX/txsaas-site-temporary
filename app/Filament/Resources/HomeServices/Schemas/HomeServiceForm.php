<?php

namespace App\Filament\Resources\HomeServices\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class HomeServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Grid::make(2)->schema([
                Select::make('position')
                    ->label('الترتيب (1..6)')
                    ->options([1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6'])
                    ->required()
                    ->unique(ignoreRecord: true),

                Toggle::make('is_active')
                    ->label('مفعل')
                    ->default(true),
            ]),

            TextInput::make('title')
                ->label('عنوان الخدمة')
                ->maxLength(255)
                ->helperText('إذا تركته فارغًا سيظهر العنوان الافتراضي في الموقع.'),

            Textarea::make('text')
                ->label('وصف الخدمة')
                ->rows(3)
                ->helperText('إذا تركته فارغًا سيظهر الوصف الافتراضي في الموقع.'),

            FileUpload::make('icon_path')
                ->label('أيقونة (SVG/PNG/JPG/WebP)')
                ->disk('public')
                ->directory('landing/services')
                ->visibility('public')
                ->preserveFilenames()
                ->acceptedFileTypes(['image/svg+xml','image/png','image/jpeg','image/webp'])
                ->helperText('إذا لم ترفع أيقونة سيستخدم الموقع SVG الافتراضي.'),
        ]);
    }
}