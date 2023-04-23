<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ShopPolicy
{
    use HandlesAuthorization;
    //filter
    public function before(User $user)
    {
        if( $user->hasRole('Admin')){
            return true;
        }
    }
    public function viewAny(User $user)
    {
        if( $user->hasRole('Seller')|| $user->hasPermissionTo('View Shop')){
            return true;
        }
    }
    public function view(User $user, Shop $shop)
    {
        if($user->id == $shop->user_id || $user->hasPermissionTo('View Shop')){
            return true;
        }
    }
    public function create(User $user)
    {
        if( $user->hasRole('Seller')||$user->hasPermissionTo('Create Shop')){
            return true;
        }
    }
    public function update(User $user, Shop $shop)
    {
        if($user->id == $shop->user_id || $user->hasPermissionTo('Update Shop')){
            return true;
        }
    }
    public function delete(User $user, Shop $shop)
    {
        if ($user->id == $shop->user_id || $user->hasPermissionTo('Delete Shop')) {
            return true;
        }
    }
}
