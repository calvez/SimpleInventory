<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Product;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;
use Illuminate\Support\Facades\DB;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Tranzakció';

    protected static ?string $pluralLabel = 'Tranzakciók';

    protected static ?string $navigationLabel = 'Tranzakciók';

    public static function form(Form $form): Form
    {
        $lastq = DB::table('transactions')
            ->latest()
            ->first();
        $last = (int) $lastq->id + 1;

        return $form
            ->schema(
                [
                    Forms\Components\TextInput::make('reference')
                        ->label('Azonosító')
                        ->maxLength(100)
                        ->default('TRANS-'.date('Ymd').'-'.$last),
                    Forms\Components\DatePicker::make('date_of_trans')
                        ->label('Dátum')
                        ->default(now()),
                    Forms\Components\TextInput::make('name')->label('megjegyzés')
                        ->label('Megjegyzés')
                        ->maxLength(100),
                    Forms\Components\Select::make('type')->options(
                        [
                            'in' => 'Bevétel',
                            'out' => 'Kiadás',
                        ]
                    ),
                    TableRepeater::make('items')
                        ->relationship('items')
                        ->schema(
                            [
                                Select::make('product_id')
                                    ->label('Termék')
                                    ->options(Product::pluck('name', 'id'))
                                    ->searchable(),
                                Forms\Components\TextInput::make('quantity')
                                    ->label('Mennyiség')
                                    ->numeric(),
                            ]
                        )
                        ->collapsible()
                        ->defaultItems(3),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                    Tables\Columns\TextColumn::make('reference')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('created_at')
                        ->dateTime()
                        ->label('Dátum')
                        ->sortable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
