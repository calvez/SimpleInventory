<?php

namespace App\Filament\Resources\StorageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $label = 'Termék';

    protected static ?string $title = 'Termékek';

    public function canCreate(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\TextInput::make('min_quantity')->label('Min. mennyiség'),
                    Forms\Components\TextInput::make('max_quantity')->label('Max. mennyiség'),
                    Forms\Components\TextInput::make('reorder_quantity')->label('Rendelési mennyiség'),
                    Forms\Components\TextInput::make('reorder_days')->label('Rendelési napok'),
                ]
            );
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('product_id')
            ->columns([
                Tables\Columns\TextColumn::make('product.name')->label('Termék'),
                Tables\Columns\TextColumn::make('quantity')->label('Mennyiség'),
                Tables\Columns\TextColumn::make('min_quantity')->label('Min. mennyiség'),
                Tables\Columns\TextColumn::make('max_quantity')->label('Max. mennyiség'),
                Tables\Columns\TextColumn::make('reorder_quantity')->label('Rendelési mennyiség'),
                Tables\Columns\TextColumn::make('reorder_days')->label('Rendelési napok'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
