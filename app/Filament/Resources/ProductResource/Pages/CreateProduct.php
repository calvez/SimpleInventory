<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Milon\Barcode\DNS2D;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    //    protected function mutateFormDataBeforeCreate(array $data): array
    //    {
    //
    //        $file = DNS1D::getBarcodeSVG('123', "C39", 1, 25, '#2A3239');
    //        $image = Storage::put('barcodes/test.png', base64_decode($file));
    //        $url = Storage::url($image);
    //        $this->data['barcode_img'] = $url;
    //
    //        return $data;
    //    }
}
