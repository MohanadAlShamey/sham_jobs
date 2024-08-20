<?php

namespace App\Filament\Resources;

use App\Enums\AskTypeEnum;
use App\Filament\Resources\GroupResource\Pages;
use App\Filament\Resources\GroupResource\RelationManagers;
use App\Models\Group;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GroupResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false; // TODO: Change the autogenerated stub
    }

    public static function canEdit(Model $record): bool
    {
        return false; // TODO: Change the autogenerated stub
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(function ($livewire, $record) {
                if ($record === null) return [];
                else {
                    return [
                        Forms\Components\TextInput::make('t')
                    ];
                }
            });
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema(function ($record) {
            $list = [];
            foreach ($record->answers as $answer) {
                if ($answer->ask->type === AskTypeEnum::FILE->value) {

                    $list[] = Actions::make([
                        Action::make('resetStars')
                            ->color('danger')
                            ->url(fn() => asset('storage/' . $answer->answer), true)->label('تحميل ' . $answer->ask->title),
                        // يمكنك إضافة المزيد من الإجراءات هنا
                    ]);
                    //  $list[]=   Action::make('visit')->url(asset('storage/'.$answer->answer))->label('مرفق');
                } else {
                    $list[] = TextEntry::make('answer' . $answer->id)->default($answer->answer)->label($answer->ask->title);

                }
            }
            return $list;
        }); // TODO: Change the autogenerated stub
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('job.name'),
                Tables\Columns\TextColumn::make('created_at')->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListGroups::route('/'),
            'create' => Pages\CreateGroup::route('/create'),
            'edit' => Pages\EditGroup::route('/{record}/edit'),
        ];
    }
}
