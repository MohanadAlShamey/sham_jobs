<?php

namespace App\Filament\Resources\AskResource\Pages;

use App\Filament\Resources\AskResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAsk extends EditRecord
{
    protected static string $resource = AskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
