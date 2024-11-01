<?php

namespace App\Policies;

use App\Models\Section;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function create(User $user): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }
    public function edit(User $user): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

}
