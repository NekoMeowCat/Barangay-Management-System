<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use App\Models\Purok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Actions\ViewAction;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Support\Colors\Color;



class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Admin Management';
    
    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->image()
                        ->imageEditor()
                        ->disk('public')
                        ->directory('images')
                        ->avatar(),
                    Forms\Components\TextInput::make('name')
                        ->required(),
                    Forms\Components\TextInput::make('middle_name')
                        ->required(),
                    Forms\Components\TextInput::make('last_name')
                        ->required(),
                    Forms\Components\TextInput::make('password')
                        ->required()
                        ->hiddenOn('edit')
                        ->password(),
                    Forms\Components\TextInput::make('confirm_password')
                        ->password()
                        ->hiddenOn('edit')
                        ->required()
                        ->same('password')
                        ->requiredWith('password'),
                    Forms\Components\Select::make('purok_id')
                        ->required()
                        ->relationship('Purok', 'name'),
                    Forms\Components\TextInput::make('email')
                        ->required()
                        ->email(),
                    Forms\Components\Select::make('role')
                        ->required()
                        ->options(User::ROLES)
                        ->searchable(),
                    Forms\Components\DatePicker::make('birth_date')
                        ->required()
                        ->displayFormat('d/m/Y'),
                    Forms\Components\TextInput::make('birth_place')
                        ->required(),
                    Forms\Components\TextInput::make('age')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('status')
                        ->required()
                        ->label('Civil Status'),
                    Forms\Components\TextInput::make('blood_type')
                        ->required(),
                    Forms\Components\TextInput::make('occupation')
                        ->required(),
                    Forms\Components\TextInput::make('religion')
                        ->required(),
                    Forms\Components\Select::make('gender')
                        ->required()
                        ->options([
                            'male' => 'Male',
                            'female' => 'Female',
                            'others' => 'Others',
                        ]),
                    Forms\Components\TextInput::make('nationality')
                        ->required(),
                ]);
    }
    
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Grid::make(2)
                    ->schema([
                        Group::make([
                            ImageEntry::make('image')
                                ->label('Profile Picture')
                                ->width(200)
                                ->height(200)
                                ->size(200),
                            TextEntry::make('name')
                                ->label('Name')
                                ->color('primary'),
                            TextEntry::make('middle_name')
                                ->label('Middle Name')
                                ->color('primary'),
                            TextEntry::make('last_name')
                                ->label('Last Name')
                                ->color('primary'),
                            TextEntry::make('email')
                                ->label('Email')
                                ->color('primary'),
                            TextEntry::make('age')
                                ->label('Age')
                                ->color('primary'),
                            TextEntry::make('gender')
                                ->label('Gender')
                                ->color('primary'),
                        ]),
                        Group::make([
                            TextEntry::make('purok.name')
                                ->label('Purok')
                                ->color('primary'),
                            TextEntry::make('birth_date')
                                ->label('Birthday')
                                ->color('primary')
                                ->date(),
                            TextEntry::make('birth_place')
                                ->label('Birth Place')
                                ->color('primary'),
                            TextEntry::make('status')
                                ->color('primary')
                                ->label('Civil Status'),
                            TextEntry::make('blood_type')
                                ->color('primary')
                                ->label('Blood Type'),
                            TextEntry::make('occupation')
                                ->color('primary')
                                ->label('Occupation'),
                            TextEntry::make('religion')
                                ->color('primary')
                                ->label('Religion'),
                            TextEntry::make('nationality')
                                ->color('primary')
                                ->label('Nationality'),
                        ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('role'),
                
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label('Select Filter')
                    ->options([
                        'admin' => 'Admin',
                        'resident' => 'Resident',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return User::count();
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
