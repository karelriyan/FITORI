<?php

namespace App\Filament\Resources\Kolams\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class KolamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kolam')
                    ->schema([
                        TextInput::make('nama_kolam')
                            ->label('Nama Kolam')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('kapasitas_air')
                            ->label('Kapasitas Air')
                            ->numeric()
                            ->required(),
                        TextInput::make('luas_kolam')
                            ->label('Luas Kolam')
                            ->numeric()
                            ->required(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
