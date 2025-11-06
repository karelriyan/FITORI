<?php

namespace App\Filament\Resources\Kolams\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions;

class AlatRelationManager extends RelationManager
{
    protected static string $relationship = 'Alat';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Alat')
                ->schema([
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
                ])
                ->columnSpanFull(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_alat')
                    ->label('Nama Alat')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('jenis_alat')
                    ->label('Jenis Alat')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),
            ])
            ->headerActions([
                Actions\CreateAction::make(),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

