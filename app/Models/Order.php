<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    //order have many items which is product with added field
    public function items():BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_items','order_id','product_id');
    }
}
