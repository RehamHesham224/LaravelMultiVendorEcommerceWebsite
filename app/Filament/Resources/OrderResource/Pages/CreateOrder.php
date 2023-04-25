<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Order Created';
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        if(empty($data['billing_full_name'])) {
            $data['billing_full_name'] = $data['shipping_full_name'];
            $data['billing_state'] = $data['shipping_state'];
            $data['billing_city'] = $data['shipping_city'];
            $data['billing_address'] = $data['shipping_address'];
            $data['billing_phone'] = $data['shipping_phone'];
            $data['billing_zipcode'] = $data['shipping_zipcode'];
        }
        return $data;
    }

}
