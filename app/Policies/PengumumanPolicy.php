<?php

namespace App\Policies;

use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PengumumanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_pengumuman');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pengumuman $pengumuman): bool
    {
        return $user->can('view_pengumuman');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_pengumuman');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pengumuman $pengumuman): bool
    {
        return $user->can('update_pengumuman');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pengumuman $pengumuman): bool
    {
        return $user->can('delete_pengumuman');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pengumuman $pengumuman): bool
    {
        return $user->can('restore_pengumuman');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pengumuman $pengumuman): bool
    {
        return $user->can('force_delete_pengumuman');
    }
}
