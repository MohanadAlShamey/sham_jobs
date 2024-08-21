<?php

namespace App\Filament\Resources\JobResource\RelationManagers;

use App\Enums\AskTypeEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsksRelationManager extends RelationManager
{
    protected static string $relationship = 'asks';
protected static ?string $title='الأسئلة';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Toggle::make('required')->label('الحقل مطلوب'),
                    Forms\Components\Radio::make('type')->options([
                        AskTypeEnum::TEXT->value => AskTypeEnum::TEXT->value,
                        AskTypeEnum::EMAIL->value => AskTypeEnum::EMAIL->value,
                        AskTypeEnum::DATE->value => AskTypeEnum::DATE->value,

                        AskTypeEnum::NUMBER->value => AskTypeEnum::NUMBER->value,
                        AskTypeEnum::FILE->value => AskTypeEnum::FILE->value,
                        AskTypeEnum::RADIO->value => AskTypeEnum::RADIO->value,
                        AskTypeEnum::CHECKBOX->value => AskTypeEnum::CHECKBOX->value,

                    ])->label('نوع الحقل')->required()->live()->inline(),
                    Forms\Components\Repeater::make('options')->schema([
                        Forms\Components\TextInput::make('option')->label('الخيار'),
                    ])->visible(fn($get) => $get('type') === AskTypeEnum::RADIO->value || $get('type') === AskTypeEnum::CHECKBOX->value)
                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
