<?php

namespace App\Filament\Resources\OptionResource\Pages;

use App\Events\ChangeFilterSettingEvent;
use App\Filament\Resources\OptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;

class EditOption extends EditRecord
{
    protected static string $resource = OptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        try {
            $model = parent::handleRecordUpdate($record, $data);
            try {
                event(new ChangeFilterSettingEvent());
                return $model;
            } catch (\Exception | Halt | \Error $e) {
                throw new Halt($e->getMessage());
            }
        } catch (Halt $exception) {
            $exception->shouldRollbackDatabaseTransaction() ?
                $this->rollBackDatabaseTransaction() :
                $this->commitDatabaseTransaction();
            return $record;
        }

    }
}
