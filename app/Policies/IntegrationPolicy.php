<?php

namespace App\Policies;

use App\Models\Integration;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class IntegrationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Integration $integration
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Integration $integration)
    {
        return $user->id === $integration->user_id
            ? Response::allow()
            : Response::deny('Yetkiniz yok.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Integration $integration
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Integration $integration)
    {
        return $user->id === $integration->user_id
            ? Response::allow()
            : Response::deny('Yetkiniz yok.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Integration $integration
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Integration $integration)
    {
        return $user->id === $integration->user_id
            ? Response::allow()
            : Response::deny('Yetkiniz yok.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Integration $integration
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Integration $integration)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Integration $integration
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Integration $integration)
    {
        //
    }
}
