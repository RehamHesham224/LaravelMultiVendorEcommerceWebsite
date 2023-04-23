<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Product Created';
    }
//    protected function mutateFormDataBeforeCreate(array $data): array
//    {
//        if(auth()->user()->hasRole('Seller')) {
//            $data['shop_id']= auth()->user()->shop->id;
//        }
//        return $data;
//    }
}
