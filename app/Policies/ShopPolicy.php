<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ShopPolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user)
    {
        if( $user->hasPermissionTo('View Shop')){
            return true;
        }
        return false;
    }
    public function view(User $user)
    {
        if( $user->hasPermissionTo('View Shop')){
            return true;
        }
        return false;
    }
    public function create(User $user)
    {
        if( $user->hasPermissionTo('Create Shop')){
            return true;
        }
        return false;
    }
    public function update(User $user, Shop $shop)
    {
        if( $user->hasPermissionTo('Update Shop')){
            return true;
        }
        return false;
    }
    public function delete(User $user, Shop $shop)
    {
        if ($user->hasPermissionTo('Delete Shop')) {
            return true;
        }
        return false;
    }
//    {
//        return $user->id == $shop->user_id;
//    }

//    public function before(User $user, Shop $shop)
//    {
//        //TODO only role admin
//        if($user->id == $shop->user_id){
//            return true;
//        }
//    }
//    /**
//     * @param User $user
//     * @param Shop $shop
//     * @return bool
//     */
//    public function browse(User $user, Shop $shop): bool
//    {
//        //TODO only role seller
//        return $user->id == $shop->user_id;
//    }
//
//    /**
//     * @param User $user
//     * @param Shop $shop
//     * @return bool
//     */
//    public function read(User $user, Shop $shop): bool
//    {
//        return $user->id == $shop->user_id;
//    }
//
//    /**
//     * Determine whether the user can edit the model.
//     *
//     * @param  \App\Models\User  $user
//     * @param  \App\Models\Shop  $shop
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//    public function edit(User $user, Shop $shop)
//    {
//        return $user->id == $shop->user_id;
//    }
//
//    /**
//     * Determine whether the user can update the model.
//     *
//     * @param  \App\Models\User  $user
//     * @param  \App\Models\Shop  $shop
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//    public function update(User $user, Shop $shop)
//    {
//        return $user->id == $shop->user_id;
//    }
//
//    /**
//     * Determine whether the user can create models.
//     *
//     * @param User $user
//     * @param Shop $shop
//     * @return Response|bool
//     */
//
//    public function add(User $user, Shop $shop)
//    {
//        //
//    }
//    /**
//     * Determine whether the user can delete the model.
//     *
//     * @param  \App\Models\User  $user
//     * @param  \App\Models\Shop  $shop
//     * @return \Illuminate\Auth\Access\Response|bool
//     */
//
//    public function delete(User $user, Shop $shop)
//    {
//        return $user->id == $shop->user_id;
//    }


}
