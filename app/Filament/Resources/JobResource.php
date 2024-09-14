<?php

namespace App\Filament\Resources;

use App\Enums\JobTypeEnum;
use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = "الوظائف";
    protected static ?string $label = "إعلان وظيفة";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('الوظائف')->schema([
                    Forms\Components\TextInput::make('name')->label('اسم الوظيفة')->required(),
                    Forms\Components\TextInput::make('city')->label('المدينة')->required(),
                    Forms\Components\RichEditor::make('info')->label('وصف الوظيفة')->required(),
                    Forms\Components\TextInput::make('code')->label('كود الوظيفة')->required(),
                    Forms\Components\TextInput::make('manager')->label('المدير المباشر')->required(),
                    Forms\Components\Toggle::make('active')->label('حالة التفعيل'),
                    Forms\Components\Textarea::make('filter')->label('طريقة الفلترة على الذكاء الصناعي'),
                    Forms\Components\DatePicker::make('end_date')->label('تاريخ نهاية التقديم / إغلاق الرابط')->required()/*->minDate(now()->addDay())*/,
                    Forms\Components\Select::make('type')->options([
                        JobTypeEnum::MANAGER->value => JobTypeEnum::MANAGER->getLabel(),
                        JobTypeEnum::SERVICE->value => JobTypeEnum::SERVICE->getLabel(),
                    ])->default(JobTypeEnum::MANAGER->value)->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('اسم الوظيفة'),
                Tables\Columns\TextColumn::make('city')->label('المدينة'),
                Tables\Columns\ToggleColumn::make('active')->label('حالة التفعيل'),
                Tables\Columns\TextColumn::make('groups_count')->label('عدد المتقدمين'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),

                Tables\Actions\ActionGroup::make([
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('download')
                        ->url(fn($record) => $record ? route('download-resumes', $record->id) : '#', true)
                        ->label('تحميل جميع المرفقات'),


                    Tables\Actions\Action::make('export')
                        ->url(fn($record) => $record ? route('csv-export', $record->id) : '#', true)
                        ->label('تصدير إلى CSV'),
                ])
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
            RelationManagers\AsksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
