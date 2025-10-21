<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create()
    {
        return view('apply');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:100',
            'email'      => 'required|email',
            'generation' => 'nullable|string|max:10',
            'motivation' => 'required|string',
        ]);

        Application::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'generation' => $validated['generation'] ?? null,
            'motivation' => $validated['motivation'],
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

    public function index(Request $request)
    {
        $q = $request->string('q')->toString();

        $applications = Application::when($q, function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('name', 'like', "%{$q}%")
                       ->orWhere('email', 'like', "%{$q}%")
                       ->orWhere('generation', 'like', "%{$q}%");
                });
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('applications.index', compact('applications', 'q'));
    }

    public function show(Application $application)
    {
        
        return view('applications.show', compact('application'));
    }

    public function edit(Application $application)  
    {
        return view('applications.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:100',
            'email'      => 'required|email',
            'generation' => 'nullable|string|max:10',
            'motivation' => 'required|string',
        ]);

        $application->update($validated);

        return redirect()
            ->route('applications.index')
            ->with('success', 'Application updated.');
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()
            ->route('applications.index')
            ->with('success', 'Application deleted.');
    }

}

