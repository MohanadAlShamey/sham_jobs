<?php

namespace App\Filament\Resources\OptionResource\Pages;

use App\Events\ChangeFilterSettingEvent;
use App\Filament\Resources\OptionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;

class CreateOption extends CreateRecord
{
    protected static string $resource = OptionResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $model= parent::handleRecordCreation($data);
        try {
            event(new ChangeFilterSettingEvent());
            return $model;
        } catch (\Exception | Halt | \Error $e) {
            throw new Halt($e->getMessage());
        }
    }
}
