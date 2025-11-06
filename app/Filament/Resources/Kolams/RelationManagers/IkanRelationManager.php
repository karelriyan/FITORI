<?php

namespace App\Filament\Resources\Kolams\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions;
use Illuminate\Support\Facades\DB;

class IkanRelationManager extends RelationManager
{
    protected static string $relationship = 'Ikan';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Ikan')
                ->schema([
                    Select::make('nama_ikan_id')
                        ->label('Nama Ikan')
                        ->options(fn() => DB::table('nama_ikans')->orderBy('nama')->pluck('nama', 'id')->all())
                        ->required()
                        ->searchable()
                        ->createOptionForm(fn(Schema $schema) => $schema->components([
                            TextInput::make('nama')
                                ->label('Nama Ikan')
                                ->required()
                                ->maxLength(255),
                        ]))
                        ->createOptionUsing(fn (array $data) => DB::table('nama_ikans')->insertGetId([
                            'nama' => $data['nama'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ])),
                    TextInput::make('jumlah_ikan')
                        ->label('Jumlah Ikan')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('usia_ikan')
                        ->label('Usia Ikan (bulan)')
                        ->numeric()
                        ->required(),
                ])
                ->columnSpanFull(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_ikan_id')
                    ->label('Nama Ikan')
                    ->sortable(),
                TextColumn::make('jumlah_ikan')
                    ->label('Jumlah')
                    ->sortable(),
                TextColumn::make('usia_ikan')
                    ->label('Usia (bulan)')
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
