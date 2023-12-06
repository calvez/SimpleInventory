<?php

namespace App\Filament\Resources\StorageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class TransactionsRelationManager extends RelationManager
{
    protected static string $relationship = 'transactions';

    protected static ?string $label = 'Tranzakció';

    protected static ?string $title = 'Tranzakciók';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('transaction_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('reference')
            ->columns(
                [
                    Tables\Columns\TextColumn::make('id')->sortable(),
                    Tables\Columns\TextColumn::make('reference')->searchable()->label('Azonosító'),
                    Tables\Columns\TextColumn::make('storageFrom.name')->searchable()->label('Raktárból'),
                    IconColumn::make('type')->icon('heroicon-o-arrow-right')->label('Típus')->sortable(),
                    Tables\Columns\TextColumn::make('storageTo.name')->searchable()->label('Raktárba'),
                    Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Dátum')->sortable(),
                ]
            )
            ->filters([
                //
            ])
            ->headerActions([])
            ->actions([

                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
