<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_categories','category_id','product_id');
    }
    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(self::class,'parent_id','id');
    }
    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function allProducts(): \Illuminate\Support\Collection
    {
        $allProducts = collect([]);
        $mainCategoryProducts=$this->products;;
        $allProducts=$allProducts->concat($mainCategoryProducts);
        if($this->children->isNotEmpty()){
            foreach($this->children as $child){
                $allProducts=$allProducts->concat($child->products);
            }
        }
        return $allProducts;
    }
}
