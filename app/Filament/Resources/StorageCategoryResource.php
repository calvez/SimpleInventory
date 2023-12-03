<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StorageCategoryResource\Pages;
use App\Models\StorageCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StorageCategoryResource extends Resource
{
    protected static ?string $model = StorageCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Raktár';

    protected static ?string $pluralLabel = 'Raktár kategóriák';

    protected static ?string $navigationLabel = 'Raktár kategóriák';

    protected static ?string $slug = 'raktar-kategoriak';

    protected static ?string $navigationGroup = 'Beállítások';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListStorageCategories::route('/'),
            'create' => Pages\CreateStorageCategory::route('/create'),
            'edit' => Pages\EditStorageCategory::route('/{record}/edit'),
        ];
    }
}
