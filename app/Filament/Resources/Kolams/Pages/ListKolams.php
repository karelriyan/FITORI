<?php

namespace App\Filament\Resources\Kolams\Pages;

use App\Filament\Resources\Kolams\KolamResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKolams extends ListRecords
{
    protected static string $resource = KolamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
