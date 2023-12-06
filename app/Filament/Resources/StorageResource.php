<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StorageResource\Pages;
use App\Filament\Resources\StorageResource\RelationManagers\AddressesRelationManager;
use App\Filament\Resources\StorageResource\RelationManagers\ProductsRelationManager;
use App\Filament\Resources\StorageResource\RelationManagers\TransactionsRelationManager;
use App\Models\Storage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StorageResource extends Resource
{
    protected static ?string $model = Storage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Raktár';

    protected static ?string $pluralLabel = 'Raktárak';

    protected static ?string $navigationLabel = 'Raktárak';

    protected static ?string $slug = 'raktarak';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\TextInput::make('name')->label('Név')
                        ->maxLength(100),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                    Tables\Columns\TextColumn::make('name')->label('Név')
                        ->searchable()
                        ->description(fn (Storage $record): string => $record->getPrimaryAddress()->getHtml())
                        ->html(),
                    Tables\Columns\TextColumn::make('created_at')->label('Létrehozva')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('updated_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ]
            )
            ->filters(
                [
                    //
                ]
            )
            ->actions(
                [
                    Tables\Actions\EditAction::make(),
                ]
            )
            ->bulkActions(
                [
                    Tables\Actions\BulkActionGroup::make(
                        [
                            Tables\Actions\DeleteBulkAction::make(),
                        ]
                    ),
                ]
            );
    }

    public static function getRelations(): array
    {
        return [
            ProductsRelationManager::class,
            TransactionsRelationManager::class,
            AddressesRelationManager::class,

            //RelationManagers\ProductsRelationManager::class,

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStorages::route('/'),
            'create' => Pages\CreateStorage::route('/create'),
            'view' => Pages\ViewStorage::route('/{record}'),
            'edit' => Pages\EditStorage::route('/{record}/edit'),
        ];
    }
}
