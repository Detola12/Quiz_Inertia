<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SectionController extends Controller
{
    public function index()
    {
        return Inertia::render('Section/Show', [
            'sections' => Section::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Section/Create');
    }

    public function store(Request $request)
    {
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
        return Inertia::render('Section/Edit', [
            'section' => $section
        ]);
    }

    public function update(Section $section, Request $request)
    {
        $request->validate([
            'section' => 'required|string'
        ]);

        $section->name = $request->section;
        $section->save();
        return $this->index();
    }
}
