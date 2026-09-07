<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Estado;

class EstadoPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array(optional($user->rol)->nombre, ['Administrador', 'Operador', 'Consultor']);
    }

    public function view(User $user, Estado $model): bool
    {
        return in_array(optional($user->rol)->nombre, ['Administrador', 'Operador', 'Consultor']);
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Estado $model): bool
    {
        return optional($user->rol)->nombre === 'Administrador';
    }

    public function delete(User $user, Estado $model): bool
    {
        return false;
    }
}
