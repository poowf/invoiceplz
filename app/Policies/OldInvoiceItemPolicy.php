<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OldInvoiceItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class OldInvoiceItemPolicy
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

    /**
     * Determine whether the user can view the oldInvoiceItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OldInvoiceItem  $oldInvoiceItem
     * @return mixed
     */
    public function view(User $user, OldInvoiceItem $oldInvoiceItem)
    {
        return $user->can('view-invoice');
    }

    /**
     * Determine whether the user can create oldInvoiceItems.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create-invoice');
    }

    /**
     * Determine whether the user can update the oldInvoiceItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OldInvoiceItem  $oldInvoiceItem
     * @return mixed
     */
    public function update(User $user, OldInvoiceItem $oldInvoiceItem)
    {
        return $user->can('update-invoice');
    }

    /**
     * Determine whether the user can delete the oldInvoiceItem.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OldInvoiceItem  $oldInvoiceItem
     * @return mixed
     */
    public function delete(User $user, OldInvoiceItem $oldInvoiceItem)
    {
        return $user->can('delete-invoice');
    }
}
