<?php

namespace App\Policies;

use App\Models\Models\Game;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GamePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  App\Models\Models\Game $game
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Game $game)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->level >= User::ADMIN_LEVEL;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  App\Models\Models\Game  $game
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Game $game)
    {
        if (!$game->exists){
            return $user->level >= User::ADMIN_LEVEL;
        } else {
            return $user->level == User::ADMIN_LEVEL && $game->exists;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  App\Models\Models\Game  $game
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Game $game)
    {
        return $user->level == User::ADMIN_LEVEL && $game->exists;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  App\Models\Models\Game  $game
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Game $game)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  App\Models\Models\Game  $game
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Game $game)
    {
        //
    }
}
