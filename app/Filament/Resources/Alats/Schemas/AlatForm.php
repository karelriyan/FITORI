<?php

namespace App\Filament\Resources\Alats\Schemas;

use App\Models\Kolam;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class AlatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_alat')
                    ->label('Nama Alat')
                    ->required()
                    ->maxLength(255),
                TextInput::make('jenis_alat')
                    ->label('Jenis Alat')
                    ->required()
                    ->maxLength(255),
                TextInput::make('status')
                    ->label('Status')
                    ->required()
                    ->maxLength(255),
                Select::make('kolam_id')
                    ->label('Kolam')
                    ->options(fn () => Kolam::query()->orderBy('nama_kolam')->pluck('nama_kolam', 'id')->all())
                    ->searchable()
                    ->required(),
            ]);
    }
}

