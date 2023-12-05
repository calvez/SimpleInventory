<?php

namespace App\Filament\Resources\StorageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AddressesRelationManager extends RelationManager
{
    protected static string $relationship = 'addresses';

    protected static ?string $label = 'Cím';

    protected static ?string $title = 'Címek';

    /**
     * @deprecated Override the `table()` method to configure the table.
     */
    protected static ?string $pluralLabel = 'Címek';

    public function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\TextInput::make('street')->required()->maxLength(255)->label('Utca'),
                    Forms\Components\TextInput::make('city')->required()->maxLength(255)->label('Város'),
                    Forms\Components\TextInput::make('state')->required()->maxLength(255)->label('Megye'),
                    Forms\Components\TextInput::make('post_code')->required()->maxLength(255)->label('Irányítószám'),
                    Forms\Components\TextInput::make('notes')->required()->maxLength(255)->label('Megjegyzés'),
                ]
            );
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('address_id')
            ->columns(
                [
                    Tables\Columns\TextColumn::make('street')->label('Utca'),
                    Tables\Columns\TextColumn::make('city')->label('Város'),
                    Tables\Columns\TextColumn::make('state')->label('Megye'),
                    Tables\Columns\TextColumn::make('post_code')->label('Irányítószám'),
                    Tables\Columns\TextColumn::make('notes')->label('Megjegyzés'),
                ]
            )
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
