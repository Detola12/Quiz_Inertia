<?php

namespace App\Http\Middleware;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),

            'auth' => [
                'user' => Auth::check() ? $request->user()->only(['id', 'name','email']) : null,
                'role' => Auth::check() ? $request->user()->role->name : null
            ],
            'can' => Auth::user() ? [
                'view_question' => $request->user()->can('create', Question::class),
                'create_question' => $request->user()->can('viewAll', Question::class),
                'view_section' => $request->user()->can('create', Section::class),
                'create_section' => $request->user()->can('viewAll', Section::class),
                'view_quiz' => $request->user()->can('create', Quiz::class),
                'create_quiz' => $request->user()->can('viewAll', Quiz::class),
            ] : null
        ];
    }
}
