<?php

namespace App\Policies;

use App\Models\Usuario; 
use App\Models\Pet;
use Illuminate\Auth\Access\HandlesAuthorization;

class PetPolicy
{
    use HandlesAuthorization;

    public function view(Usuario $user, Pet $pet)
{
    return $user->hasRole('admin') || $user->hasRole('manager') || $user->hasRole('viewer');
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