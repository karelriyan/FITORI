<?php

namespace App\Filament\Resources\Kolams\Pages;

use App\Filament\Resources\Kolams\KolamResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

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
}
