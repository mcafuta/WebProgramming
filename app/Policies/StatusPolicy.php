<?php

namespace App\Policies;

use App\User;
use App\Status;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ( $user->isAdmin() )
            return true;
    }

    /**
     * Determine whether the user can view the status.
     *
     * @param  \App\User   $user
     * @param  \App\Status $status
     *
     * @return mixed
     */
    public function view(User $user, Status $status)
    {
        //return $user->id === $status->user_id;
    }

    /**
     * Determine whether the user can create statuses.
     *
     * @param  \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the status.
     *
     * @param  \App\User   $user
     * @param  \App\Status $status
     *
     * @return mixed
     */
    public function update(User $user, Status $status)
    {
        return $user->id === $status->user_id;
    }

    /**
     * Determine whether the user can delete the status.
     *
     * @param  \App\User   $user
     * @param  \App\Status $status
     *
     * @return mixed
     */
    public function delete(User $user, Status $status)
    {
        return $user->id === $status->user_id;
    }
}
