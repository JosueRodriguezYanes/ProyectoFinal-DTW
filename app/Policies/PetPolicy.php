<?php

namespace App\Policies;

use App\Models\Usuario; 
use App\Models\Pet;
use Illuminate\Auth\Access\HandlesAuthorization;

class PetPolicy
{
    use HandlesAuthorization;

    public function viewAny(Usuario $user) 
    {
        return $user->hasRole('admin') || $user->hasRole('manager');
    }

    public function create(Usuario $user)
    {
        return $user->hasRole('admin');
    }

    public function update(Usuario $user, Pet $pet) 
    {
        return $user->hasRole('admin');
    }

    public function delete(Usuario $user, Pet $pet) 
    {
        return $user->hasRole('admin');
    }
}