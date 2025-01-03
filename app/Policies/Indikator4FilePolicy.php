<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Indikator4File;
use Illuminate\Auth\Access\HandlesAuthorization;

class Indikator4FilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_indikator4::file');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Indikator4File $indikator4File): bool
    {
        return $user->can('view_indikator4::file');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_indikator4::file');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Indikator4File $indikator4File): bool
    {
        return $user->can('update_indikator4::file');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Indikator4File $indikator4File): bool
    {
        return $user->can('delete_indikator4::file');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_indikator4::file');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Indikator4File $indikator4File): bool
    {
        return $user->can('force_delete_indikator4::file');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_indikator4::file');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Indikator4File $indikator4File): bool
    {
        return $user->can('restore_indikator4::file');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_indikator4::file');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Indikator4File $indikator4File): bool
    {
        return $user->can('replicate_indikator4::file');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_indikator4::file');
    }
}
