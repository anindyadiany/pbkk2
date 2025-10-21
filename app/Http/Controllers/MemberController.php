<?php

namespace App\Http\Controllers;

use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        // Prefer non-Staff roles, ordered nicely (SQLite-safe)
        $leaders = Member::where('position', '!=', 'Staff')
            ->orderByRaw("
                CASE position
                    WHEN 'Kepala Departemen' THEN 1
                    WHEN 'Sekretaris Departemen' THEN 2
                    WHEN 'Kabiro External' THEN 3
                    WHEN 'Kabiro Internal' THEN 4
                    WHEN 'Kabiro Alumni' THEN 5
                    ELSE 6
                END
            ")
            ->take(5)
            ->get();

        // Fallback: if empty (e.g., different strings), just take any 5
        if ($leaders->isEmpty()) {
            $leaders = Member::orderBy('id')->take(5)->get();
        }

        return view('welcome', compact('leaders'));
    }
}
