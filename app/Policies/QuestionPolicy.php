<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuestionPolicy
{

    public function view(User $user, Question $question): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }
    public function viewAll(User $user): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Question $question): Response
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
    public function delete(User $user, Question $question): Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }


}
