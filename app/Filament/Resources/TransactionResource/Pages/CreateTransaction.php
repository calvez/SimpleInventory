<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use App\Models\StorageProducts;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

    protected function afterCreate(): void
    {
        $items = $this->data['items'];
        foreach ($items as $key => $item) {
            $storage = StorageProducts::create(
                [
                    'storage_id' => $this->data['storage_to'],
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'min_quantity' => 0,
                    'max_quantity' => 0,
                    'reorder_quantity' => 0,
                    'reorder_days' => 0,
                ]
            );
        }
    }
}
