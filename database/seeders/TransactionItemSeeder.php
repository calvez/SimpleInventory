<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class TransactionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = \App\Models\Transaction::all();
        foreach ($transactions as $key => $trans) {
            $items = Product::inRandomOrder()
                ->limit(5)
                ->get();
            foreach ($items as $key => $item) {
                $transact = \App\Models\TransactionItem::create(
                    [
                        'transaction_id' => $trans->id,
                        'product_id' => $item->id,
                        'quantity' => rand(1, 10),
                    ]
                );
            }
        }
    }
}
