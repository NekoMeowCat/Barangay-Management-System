<?php

namespace App\Filament\Resources\BlotterResource\Pages;

use App\Filament\Resources\BlotterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlotter extends EditRecord
{
    protected static string $resource = BlotterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
