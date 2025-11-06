<?php

namespace App\Filament\Resources\Alats;

use App\Filament\Resources\Alats\Pages\CreateAlat;
use App\Filament\Resources\Alats\Pages\EditAlat;
use App\Filament\Resources\Alats\Pages\ListAlats;
use App\Filament\Resources\Alats\Schemas\AlatForm;
use App\Filament\Resources\Alats\Tables\AlatsTable;
use App\Models\Alat;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AlatResource extends Resource
{
    protected static ?string $model = Alat::class;

    protected static BackedEnum|string|null $navigationIcon = Heroicon::WrenchScrewdriver;

    protected static ?string $recordTitleAttribute = 'nama_alat';

    protected static ?string $navigationLabel = 'Daftar Alat IoT';

    protected static UnitEnum|string|null $navigationGroup = 'Manajemen Akuakultur';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return AlatForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AlatsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAlats::route('/'),
            'create' => CreateAlat::route('/create'),
            'edit' => EditAlat::route('/{record}/edit'),
        ];
    }
}
