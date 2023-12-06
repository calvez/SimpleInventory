<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\ProductCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
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
                                            Forms\Components\Select::make('product_category_id')
                                                ->label('Kategória')
                                                ->options(
                                                    ProductCategory::pluck('name', 'id')
                                                ),
                                            Forms\Components\TextInput::make('tax_id')
                                                ->label('Adó')
                                                ->numeric(),
                                            Forms\Components\TextInput::make('sku')
                                                ->label('SKU')
                                                ->required()
                                                ->maxLength(100),
                                            Forms\Components\TextInput::make('name')
                                                ->label('Név')
                                                ->required()
                                                ->maxLength(100),
                                            Forms\Components\TextInput::make('unit')
                                                ->label('Mennyiség egység')
                                                ->required()
                                                ->maxLength(100)
                                                ->default('db'),
                                            Forms\Components\TextInput::make('net_amount')
                                                ->label('Nettó ár')
                                                ->numeric(),
                                            Forms\Components\TextInput::make('gross_amount')
                                                ->label('Bruttó ár')
                                                ->numeric(),
                                            Forms\Components\TextInput::make('min_store')
                                                ->label('Min. készlet')
                                                ->numeric()
                                                ->default(1),
                                            Forms\Components\TextInput::make('barcode')
                                                ->label('Vonalkód')
                                                ->maxLength(14)
                                                ->required()
                                                ->numeric(),
                                            Forms\Components\TextInput::make('vtsz')
                                                ->label('VTSZ')
                                                ->maxLength(100),
                                        ]
                                    )
                                    ->columns(2),
                            ]
                        )
                        ->columnSpan(['lg' => fn (?Product $record) => $record === null ? 3 : 2]),
                    Forms\Components\Section::make()
                        ->schema(
                            [
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Készült')
                                    ->content(fn (Product $record): ?string => $record->created_at?->diffForHumans()),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Utolsó módosítás')
                                    ->content(fn (Product $record): ?string => $record->updated_at?->diffForHumans()),
                                Forms\Components\Textarea::make('description')
                                    ->label('Leírás')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('message')
                                    ->label('Megjegyzés')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                            ]
                        )
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
                    Tables\Columns\TextColumn::make('category.name')->label('Kategória')
                        ->sortable(),
                    Tables\Columns\TextColumn::make('tax_id')->label('Adó')
                        ->numeric()
                        ->toggleable(isToggledHiddenByDefault: true)
                        ->sortable(),
                    Tables\Columns\TextColumn::make('barcode')->label('Vonalkód')
                        ->alignRight()
                        ->searchable(),
                    Tables\Columns\TextColumn::make('sku')
                        ->label('SKU')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('name')->label('Név')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('unit')->label('Mértékegység')
                        ->searchable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('net_amount')->label('Nettó ár')
                        ->alignRight()
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('gross_amount')->label('Bruttó ár')
                        ->numeric()
                        ->alignRight()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('min_store')->label('Min. készlet')
                        ->numeric()
                        ->alignRight()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('vtsz')->label('VTSZ')
                        ->searchable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('created_at')->label('Létrehozva')
                        ->alignRight()
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('updated_at')->label('Módosítva')
                        ->alignRight()
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('deleted_at')->label('Törölve')
                        ->alignRight()
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
