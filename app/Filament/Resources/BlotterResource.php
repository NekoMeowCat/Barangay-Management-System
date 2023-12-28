<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlotterResource\Pages;
use App\Filament\Resources\BlotterResource\RelationManagers;
use App\Models\Blotter;
use App\Models\Official;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlotterResource extends Resource
{
    protected static ?string $model = Blotter::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationGroup = 'Admin Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('complainant')
                    ->required(),
                Forms\Components\TextInput::make('defendant')
                    ->required(),
                Forms\Components\MarkdownEditor::make('incident_description')
                    ->required(),
                Forms\Components\DateTimePicker::make('date_occured')
                    ->required()
                    ->seconds(false),
                Forms\Components\Select::make('status')
                    ->required()
                    ->label('Incident Status')
                    ->options([
                        'ongoing' => 'Pending',
                        'settled' => 'Settled',
                    ])
                    ->default('ongoing'),
                Forms\Components\DateTimePicker::make('schedule')
                    ->required()
                    ->seconds(false),
                Forms\Components\TextInput::make('remarks')
                    ->required(),
                Forms\Components\Select::make('officer_involved')
                    ->required()
                    ->options(Official::with('user')->get()->pluck('user.name', 'id')->toArray()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('complainant')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('defendant')
                    ->searchable(),
                Tables\Columns\TextColumn::make('incident_description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_occured')
                    ->date(),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('schedule')
                    ->label('Schedule of Appointment')
                    ->date(),
                Tables\Columns\TextColumn::make('officer_involved')
                    ->searchable()
                    ->getStateUsing(function (Blotter $record): string {
                        return $record->officerInvolved->user->name;
                    }),
            ])
            ->filters([
                Tables\Filters\Filter::make('complainant'),
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

    public static function getNavigationBadge(): ?string
    {
        return Blotter::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlotters::route('/'),
            'create' => Pages\CreateBlotter::route('/create'),
            'edit' => Pages\EditBlotter::route('/{record}/edit'),
        ];
    }
}
