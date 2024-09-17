<?php

namespace App\Filament\Resources\MailerSettingResource\Pages;

use App\Events\ChangeFilterSettingEvent;
use App\Events\ChangeSendEmailSettingEvent;
use App\Filament\Resources\MailerSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;

class EditMailerSetting extends EditRecord
{
    protected static string $resource = MailerSettingResource::class;

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
                event(new ChangeSendEmailSettingEvent());
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
