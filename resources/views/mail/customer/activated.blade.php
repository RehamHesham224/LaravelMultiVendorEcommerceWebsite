<x-mail::message>
# Congratulations

Your Shop is now active

<x-mail::button :url="{{route('shops.show',$shop->id)}}">
Visit your shop
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
