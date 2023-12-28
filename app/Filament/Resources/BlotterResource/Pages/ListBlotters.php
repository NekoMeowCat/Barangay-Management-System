<?php

namespace App\Filament\Resources\BlotterResource\Pages;

use App\Filament\Resources\BlotterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlotters extends ListRecords
{
    protected static string $resource = BlotterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
