<?php

namespace App\Filament\Resources\Kolams\Pages;

use App\Filament\Resources\Kolams\KolamResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\Kolams\RelationManagers\AlatRelationManager;
use App\Filament\Resources\Kolams\RelationManagers\IkanRelationManager;

class EditKolam extends EditRecord
{
    protected static string $resource = KolamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    public static function getRelations(): array
    {
        return [
            AlatRelationManager::class,
            IkanRelationManager::class,
        ];
    }
}
