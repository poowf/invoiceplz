<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ItemTemplate;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemTemplatePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    public function before($user, $ability)
    {
        if ($user->isAn('global-administrator')) {
            return true;
        }
    }

    public function index(User $user)
    {
        return $user->can('view-item-template');
    }

    /**
     * Determine whether the user can view the invoiceItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ItemTemplate  $itemtemplate
     * @return mixed
     */
    public function view(User $user, ItemTemplate $itemtemplate)
    {
        return $user->can('view-item-template');
    }

    /**
     * Determine whether the user can create invoiceItems.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create-item-template');
    }

    /**
     * Determine whether the user can update the invoiceItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ItemTemplate  $itemtemplate
     * @return mixed
     */
    public function update(User $user, ItemTemplate $itemtemplate)
    {
        return $user->can('update-item-template');
    }

    /**
     * Determine whether the user can delete the invoiceItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ItemTemplate  $itemtemplate
     * @return mixed
     */
    public function delete(User $user, ItemTemplate $itemtemplate)
    {
        return $user->can('delete-item-template');
    }
}
