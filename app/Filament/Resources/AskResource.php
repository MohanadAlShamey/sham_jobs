<?php

namespace App\Filament\Resources;

use App\Enums\AskTypeEnum;
use App\Filament\Resources\AskResource\Pages;
use App\Filament\Resources\AskResource\RelationManagers;
use App\Models\Ask;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AskResource extends Resource
{
    protected static ?string $model = Ask::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
protected static ?string $navigationLabel="الأسئلة الإفتراضية";
    public static function form(Form $form): Form
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

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn($query) => $query->whereNull('job_id'))
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('السؤال'),
                Tables\Columns\TextColumn::make('type')
                    ->formatStateUsing(fn($state)=>AskTypeEnum::tryFrom($state)?->getLabel())
                    ->label('نوع الإجابة'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAsks::route('/'),
            'create' => Pages\CreateAsk::route('/create'),
            'edit' => Pages\EditAsk::route('/{record}/edit'),
        ];
    }
}
