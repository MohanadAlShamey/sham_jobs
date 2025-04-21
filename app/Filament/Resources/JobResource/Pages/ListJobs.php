<?php

namespace App\Filament\Resources\JobResource\Pages;

use App\Filament\Resources\JobResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListJobs extends ListRecords
{
    protected static string $resource = JobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'open'=>Tab::make('open')->modifyQueryUsing(fn($query)=>$query->where('active',1))->label('الوظائف المفتوحة'),
            'close'=>Tab::make('close')->modifyQueryUsing(fn($query)=>$query->where('active',0))->label('الوظائف المغلقة'),
        ];
    }
}
