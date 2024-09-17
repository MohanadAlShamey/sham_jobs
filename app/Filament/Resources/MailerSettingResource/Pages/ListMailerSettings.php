<?php

namespace App\Filament\Resources\MailerSettingResource\Pages;

use App\Filament\Resources\MailerSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMailerSettings extends ListRecords
{
    protected static string $resource = MailerSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
