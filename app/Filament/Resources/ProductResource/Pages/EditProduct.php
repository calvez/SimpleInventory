<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\DNS2D;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    protected function afterSave(): void
    {
        $image = Storage::disk('public')
            ->put('test.png', base64_decode(DNS2D::getBarcodePNGPath($this->data['barcode'], "QRCODE")));
        $url = Storage::url($image);
        $this->data['barcode_img'] = $url;
        dd($this->data);
    }
}
