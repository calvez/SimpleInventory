<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationLabel = 'Termékek';

    protected static ?string $label = 'Termék';

    protected static ?string $pluralLabel = 'Termékek';

    protected static ?string $slug = 'termekek';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\Group::make()
                        ->schema(
                            [
                                Forms\Components\Section::make()
                                    ->schema(
                                        [
                                            Forms\Components\Select::make('category.name'),
                                            Forms\Components\TextInput::make('category.name')
                                                ->numeric(),
                                            Forms\Components\TextInput::make('tax_id')
                                                ->numeric(),
                                            Forms\Components\TextInput::make('sku')
                                                ->label('SKU')
                                                ->maxLength(100)
                                                ->default('text'),
                                            Forms\Components\TextInput::make('name')
                                                ->maxLength(100),
                                            Forms\Components\Textarea::make('description')
                                                ->maxLength(65535)
                                                ->columnSpanFull(),
                                            Forms\Components\Textarea::make('message')
                                                ->maxLength(65535)
                                                ->columnSpanFull(),
                                            Forms\Components\TextInput::make('unit')
                                                ->maxLength(100)
                                                ->default('db'),
                                            Forms\Components\TextInput::make('net_amount')
                                                ->numeric()
                                                ->default(123.45),
                                            Forms\Components\TextInput::make('gross_amount')
                                                ->numeric()
                                                ->default(123.45),
                                            Forms\Components\TextInput::make('min_store')
                                                ->numeric()
                                                ->default(1),
                                            Forms\Components\TextInput::make('barecode')
                                                ->maxLength(100)
                                                ->default('text'),
                                            Forms\Components\TextInput::make('vtsz')
                                                ->maxLength(100)
                                                ->default('text'),
                                        ]
                                    )
                                    ->columns(2),
                            ]
                        )
                        ->columnSpan(['lg' => fn (?Product $record) => $record === null ? 3 : 2]),
                    Forms\Components\Section::make()
                        ->schema([
                            Forms\Components\Placeholder::make('created_at')
                                ->label('Created at')
                                ->content(fn (Product $record): ?string => $record->created_at?->diffForHumans()),

                            Forms\Components\Placeholder::make('updated_at')
                                ->label('Last modified at')
                                ->content(fn (Product $record): ?string => $record->updated_at?->diffForHumans()),
                        ])
                        ->columnSpan(['lg' => 1])
                        ->hidden(fn (?Product $record) => $record === null),
                ]
            )
            ->columns(
                [
                    'sm' => 3,
                    'lg' => null,
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                    Tables\Columns\TextColumn::make('category')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('tax_id')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('sku')
                        ->label('SKU')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('name')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('unit')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('net_amount')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('gross_amount')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('min_store')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('barecode')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('vtsz')
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
                ]
            )
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
