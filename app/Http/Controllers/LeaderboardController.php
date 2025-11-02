<?php

namespace App\Http\Controllers;

use App\Models\UserResult;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboard = Cache::remember('leaderboard', 600, function () {
            return UserResult::with('user')
                ->selectRaw('user_id, sum(score) as total_score')
                ->groupBy('user_id')
                ->orderByDesc('total_score')
                ->take(10)
                ->get();
        });

        return Inertia::render('Leaderboard/Index', [
            'leaderboard' => $leaderboard
        ]);
    }
}
