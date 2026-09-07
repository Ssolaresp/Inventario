<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Rol;

class RolPolicy
{
    public function viewAny(User $user): bool
    {
        return optional($user->rol)->nombre === 'Administrador';
    }

    public function view(User $user, Rol $model): bool
    {
        return optional($user->rol)->nombre === 'Administrador';
    }

    public function create(User $user): bool
    {
        return optional($user->rol)->nombre === 'Administrador';
    }

    public function update(User $user, Rol $model): bool
    {
        return optional($user->rol)->nombre === 'Administrador';
    }

    public function delete(User $user, Rol $model): bool
    {
        return optional($user->rol)->nombre === 'Administrador';
    }
}
