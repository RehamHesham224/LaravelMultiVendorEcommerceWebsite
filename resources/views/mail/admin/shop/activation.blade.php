<x-mail::message>
# Shop activation request

Please activate shop. Here are shop details.

    Shop Name : {{$shop->name}}
    Shop Owner : {{$shop->owner->name}}

<x-mail::button :url="'/admin/shops'">
Manage Shops
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
