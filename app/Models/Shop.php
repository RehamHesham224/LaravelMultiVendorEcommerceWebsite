<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable=['name','description','rating','user_id','is_active',''];
    protected $casts = [
        'is_active' => 'boolean',
        'rating'=>'float'
    ];
    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'shop_id');
    }
}
