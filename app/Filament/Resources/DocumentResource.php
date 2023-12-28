<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationGroup = 'Admin Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Select Resident')
                    ->required()
                    ->relationship('User', 'name'),
                Forms\Components\Select::make('document_type')
                    ->label('Requested Document')
                    ->placeholder('Select a Document Type')
                    ->options([
                        'barangay_clearance' => 'Barangay Clearance',
                        'indigency' => 'Indigency',
                        'residency' => 'Residency',
                        'business permit' => 'Business Permit',
                    ]),
                Forms\Components\Select::make('status')
                    ->placeholder('Set Status')
                    ->options([
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed'
                    ]),
                Forms\Components\DatePicker::make('request_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('user.purok.name'),
                Tables\Columns\TextColumn::make('document_type'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('request_date')
                    ->date(),
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
        return Document::where('status', 'in_progress')->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
