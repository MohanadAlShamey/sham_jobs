<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OptionResource\Pages;
use App\Filament\Resources\OptionResource\RelationManagers;
use App\Models\Job;
use App\Models\Option;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OptionResource extends Resource
{
    protected static ?string $model = Option::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'الإعدادات';
    protected static ?string $navigationLabel = "الفلترة";
protected static ?string $slug="filter-settings";
    protected static ?string $label = "الإعدادات";

    public static function canCreate(): bool
    {
        return Option::count() === 0; // TODO: Change the autogenerated stub
    }

    public static function canDelete(Model $record): bool
    {
        return false; // TODO: Change the autogenerated stub
    }

    public static function canDeleteAny(): bool
    {
        return false; // TODO: Change the autogenerated stub
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('إعدادات الفلترة')->schema([
                    Forms\Components\Select::make('job_id')->options(Job::whereNotNull('excel_id')->latest()->pluck('name', 'id'))->label('الوظيفة')->required(),
                    Forms\Components\Textarea::make('criteria')->required()->label('المعايير'),
                    Forms\Components\TextInput::make('employee_count')->required()->numeric()->label('عدد المرشحين المطلوب'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job.name')->label('الوظيفة'),
                Tables\Columns\TextColumn::make('employee_count')->label('عدد المرشحين المطلوب'),
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
            'index' => Pages\ListOptions::route('/'),
            'create' => Pages\CreateOption::route('/create'),
            'edit' => Pages\EditOption::route('/{record}/edit'),
        ];
    }
}
