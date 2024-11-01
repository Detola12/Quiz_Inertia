<?php

namespace App\Policies;

use App\Models\Section;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SectionPolicy
{
    public function viewAll(User $user)
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

    public function create(User $user)
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

    public function edit(User $user, Section $section)
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

    public function delete(User $user, Section $section)
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

}
