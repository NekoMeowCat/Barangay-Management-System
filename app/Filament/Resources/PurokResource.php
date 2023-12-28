<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PurokResource\Pages;
use App\Filament\Resources\PurokResource\RelationManagers;
use App\Models\Purok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;



class PurokResource extends Resource
{
    protected static ?string $model = Purok::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';
    protected static ?string $navigationGroup = 'Admin Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {   
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->inline(),
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

    public static function getNavigationBadge(): ?string
    {
        return Purok::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPuroks::route('/'),
            'create' => Pages\CreatePurok::route('/create'),
            'edit' => Pages\EditPurok::route('/{record}/edit'),
        ];
    }
}
