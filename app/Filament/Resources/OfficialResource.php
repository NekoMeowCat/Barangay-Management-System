<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfficialResource\Pages;
use App\Filament\Resources\OfficialResource\RelationManagers;
use App\Models\Official;
use App\Models\User;
use App\Models\Purok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OfficialResource extends Resource
{
    protected static ?string $model = Official::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationGroup = 'Admin Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Select Resident')
                    ->required()
                    ->relationship('User', 'name', function ($query) {
                        $query->whereNotIn('id', Official::pluck('user_id'));
                    }),
                Forms\Components\TextInput::make('position')
                    ->required(),
                Forms\Components\DatePicker::make('term_start')
                    ,
                Forms\Components\DatePicker::make('term_end')
                    ,
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->getStateUsing(function (Official $record): string {
                    return asset('storage/' . $record->user->image);
                })
                ->circular(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Name'),
                Tables\Columns\TextColumn::make('user.last_name')
                    ->label('Last Name'),
                Tables\Columns\TextColumn::make('user.purok.name'),
                Tables\Columns\TextColumn::make('position'),
                Tables\Columns\TextColumn::make('term_start')
                    ->date('F j, Y'),
                Tables\Columns\TextColumn::make('term_end')
                    ->date('F j Y'),
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
        return Official::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOfficials::route('/'),
            'create' => Pages\CreateOfficial::route('/create'),
            'edit' => Pages\EditOfficial::route('/{record}/edit'),
        ];
    }
}
