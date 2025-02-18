<?php

namespace App\Filament\Resources;

use App\Filament\Exports\TurkeyExporter;
use App\Filament\Resources\TurkeyResource\Pages;
use App\Models\Turkey;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TurkeyResource extends Resource
{
    protected static ?string $model = Turkey::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Avatar')
                    ->schema([
                        FileUpload::make('avatar')
                            ->avatar()
                            ->hiddenLabel()
                            ->imageEditor()
                            ->image()
                            ->columnSpanFull()
                            ->alignCenter()
                            ->directory('turkey-avatars')
                            ->required(),
                    ]),
                Fieldset::make('General Information')
                    ->schema([
                        Select::make('mood')
                            ->options([
                                'Happy' => 'Happy',
                                'Angry' => 'Angry',
                                'Sleepy' => 'Sleepy',
                                'Excited' => 'Excited',
                            ])
                            ->default('Happy')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('name')->required(),
                        TextInput::make('age')->numeric()->required(),
                        TextInput::make('color')->required(),
                        TextInput::make('weight')->numeric()->required(),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('age')->sortable(),
                TextColumn::make('color')->searchable(),
                TextColumn::make('weight')->sortable(),
                TextColumn::make('mood')->sortable()->searchable(),
                ImageColumn::make('avatar')
                    ->defaultImageUrl(function ($record) {
                        return 'https://ui-avatars.com/api/?background=0D8ABC&color=fff&name='.urlencode($record->name);
                    })
                    ->circular(),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('mood')->options([
                    'Happy' => 'Happy',
                    'Angry' => 'Angry',
                    'Sleepy' => 'Sleepy',
                    'Excited' => 'Excited',
                ]),
            ])
            ->actions(Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]))
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->exporter(TurkeyExporter::class)
                        ->formats([
                            ExportFormat::Xlsx,
                            ExportFormat::Csv,
                        ]),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(TurkeyExporter::class)
                    ->columnMapping(false)
                    ->formats([
                        ExportFormat::Xlsx,
                        ExportFormat::Csv,
                    ])->openUrlInNewTab(),
            ])
            ->searchable();
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
            'index' => Pages\ListTurkeys::route('/'),
            'create' => Pages\CreateTurkey::route('/create'),
            'edit' => Pages\EditTurkey::route('/{record}/edit'),
        ];
    }
}
