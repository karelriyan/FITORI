<?php

namespace App\Filament\Resources\Kolams;

use App\Filament\Resources\Kolams\Pages\CreateKolam;
use App\Filament\Resources\Kolams\Pages\EditKolam;
use App\Filament\Resources\Kolams\Pages\ListKolams;
use App\Filament\Resources\Kolams\Schemas\KolamForm;
use App\Filament\Resources\Kolams\Tables\KolamsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Kolam;

class KolamResource extends Resource
{
    protected static ?string $model = Kolam::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Kolam';

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
            //
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

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
