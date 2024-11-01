<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class SectionController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAll', Section::class);
        return Inertia::render('Section/Show', [
            'sections' => Section::all()
        ]);
    }

    public function create()
    {
        Gate::authorize('create', Section::class);
        return Inertia::render('Section/Create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Section::class);
        $request->validate([
            'section' => 'required|string'
        ]);

        Section::create([
            'name' => $request->input('section')
        ]);

        return redirect()->route('section.index');
    }

    public function edit(Section $section)
    {
        Gate::authorize('edit', Section::class);
        return Inertia::render('Section/Edit', [
            'section' => $section
        ]);
    }

    public function update(Section $section, Request $request)
    {
        Gate::authorize('edit', Section::class);
        $request->validate([
            'section' => 'required|string'
        ]);

        $section->name = $request->section;
        $section->save();
        return $this->index();
    }
}
