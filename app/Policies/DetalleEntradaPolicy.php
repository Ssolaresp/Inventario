<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DetalleEntrada;

class DetalleEntradaPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array(optional($user->rol)->nombre, ['Administrador', 'Operador', 'Consultor']);
    }

    public function view(User $user, DetalleEntrada $model): bool
    {
        return in_array(optional($user->rol)->nombre, ['Administrador', 'Operador', 'Consultor']);
    }

    public function create(User $user): bool
    {
        return in_array(optional($user->rol)->nombre, ['Administrador', 'Operador']);
    }

    public function update(User $user, DetalleEntrada $model): bool
    {
        return in_array(optional($user->rol)->nombre, ['Administrador', 'Operador']);
    }

    public function delete(User $user, DetalleEntrada $model): bool
    {
        return optional($user->rol)->nombre === 'Administrador';
    }

    public function restore(User $user, DetalleEntrada $model): bool
    {
        return optional($user->rol)->nombre === 'Administrador';
    }

    public function forceDelete(User $user, DetalleEntrada $model): bool
    {
        return optional($user->rol)->nombre === 'Administrador';
    }
}
