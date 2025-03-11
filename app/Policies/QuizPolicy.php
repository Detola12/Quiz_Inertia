<?php

namespace App\Policies;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuizPolicy
{
    public function create(User $user) : Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

    public function edit(User $user, Quiz $quiz) : Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

    public function delete(User $user, Quiz $quiz) : Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }

    public function view(User $user, Quiz $quiz) : Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }
    public function viewAll(User $user) : Response
    {
        return $user->is_admin
            ? Response::allow()
            : Response::deny('Not Authorized');
    }
}
