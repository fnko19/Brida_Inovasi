<?php

namespace App\Policies;

use App\Models\ProfilPemda;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfilPemdaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_profil::pemda');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProfilPemda $profilPemda): bool
    {
        return $user->can('view_profil::pemda');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_profil::pemda');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProfilPemda $profilPemda): bool
    {
        return $user->can('update_profil::pemda');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProfilPemda $profilPemda): bool
    {
        return $user->can('delete_profil::pemda');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProfilPemda $profilPemda): bool
    {
        return $user->can('restore_profil::pemda');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProfilPemda $profilPemda): bool
    {
        return $user->can('force_delete_profil::pemda');
    }
}