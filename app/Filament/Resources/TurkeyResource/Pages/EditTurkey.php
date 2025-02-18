<?php

namespace App\Filament\Resources\TurkeyResource\Pages;

use App\Filament\Resources\TurkeyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTurkey extends EditRecord
{
    protected static string $resource = TurkeyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
