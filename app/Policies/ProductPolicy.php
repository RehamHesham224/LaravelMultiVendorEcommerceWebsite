<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    public function before(User $user)
    {
        if( $user->hasRole('Admin')){
            return true;
        }
    }
    public function viewAny(User $user)
    {
        if( $user->hasRole('Seller')|| $user->hasPermissionTo('View Any Shop')){
            return true;
        }
    }
    public function view(User $user, Product $product)
    {
        if(empty($product->shop)){
            return false;
        }
        else if( $user->id == $product->shop->user_id|| $user->hasPermissionTo('View Products')){
            return true;
        }
    }
    public function create(User $user)
    {
        if( $user->hasRole('Seller')||$user->hasPermissionTo('Create Products')){
            return true;
        }
    }
    public function update(User $user, Product $product)
    {
        if(empty($product->shop)){
            return false;
        }
        else if($user->id == $product->shop->user_id || $user->hasPermissionTo('Update Products')){
            return true;
        }
    }
    public function delete(User $user,  Product $product)
    {
        if(empty($product->shop)){
            return false;
        }
        else if ($user->id == $product->shop->user_id || $user->hasPermissionTo('Delete Products')) {
            return true;
        }
    }
}
