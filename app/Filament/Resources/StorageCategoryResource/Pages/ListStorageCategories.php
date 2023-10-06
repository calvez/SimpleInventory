<?php

namespace App\Filament\Resources\StorageCategoryResource\Pages;

use App\Filament\Resources\StorageCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStorageCategories extends ListRecords
{
    protected static string $resource = StorageCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
