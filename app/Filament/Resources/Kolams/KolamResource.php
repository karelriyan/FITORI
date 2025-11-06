<?php

namespace App\Filament\Resources\Kolams;

use App\Filament\Resources\Kolams\Pages\CreateKolam;
use App\Filament\Resources\Kolams\Pages\EditKolam;
use App\Filament\Resources\Kolams\Pages\ListKolams;
use App\Filament\Resources\Kolams\RelationManagers\AlatRelationManager;
use App\Filament\Resources\Kolams\RelationManagers\IkanRelationManager;
use App\Filament\Resources\Kolams\Schemas\KolamForm;
use App\Filament\Resources\Kolams\Tables\KolamsTable;
use App\Models\Kolam;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;


class KolamResource extends Resource
{
    protected static ?string $model = Kolam::class;

    protected static BackedEnum|string|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_kolam';

    protected static ?string $navigationLabel = 'Daftar Kolam';

    protected static UnitEnum|string|null $navigationGroup = 'Manajemen Akuakultur';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return KolamForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KolamsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            AlatRelationManager::class,
            IkanRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKolams::route('/'),
            'create' => CreateKolam::route('/create'),
            'edit' => EditKolam::route('/{record}/edit'),
        ];
    }

    // No custom record route binding needed for this resource.
}
