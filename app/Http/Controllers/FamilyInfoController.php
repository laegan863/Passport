<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyInfo;

class FamilyInfoController extends Controller
{
    /**
     * Show the family info form.
     */
    public function create()
    {
        return view('main.content.forms.family-info');
    }

    /**
     * Store the family info (temporary: save to session).
     */
    public function store(Request $request)
    {
        $rules = [
            'marital_status' => 'required|string',

            'mother_unknown' => 'sometimes',
            'mother_firstname' => 'nullable|string|max:255',
            'mother_middlename' => 'nullable|string|max:255',
            'mother_lastname' => 'nullable|string|max:255',
            'mother_dob' => 'nullable|date',
            'mother_us_citizen' => 'nullable|in:yes,no',
            'mother_country' => 'nullable|string|max:255',
            'mother_city' => 'nullable|string|max:255',

            'father_unknown' => 'sometimes',
            'father_firstname' => 'nullable|string|max:255',
            'father_middlename' => 'nullable|string|max:255',
            'father_lastname' => 'nullable|string|max:255',
            'father_dob' => 'nullable|date',
            'father_us_citizen' => 'nullable|in:yes,no',
            'father_country' => 'nullable|string|max:255',
            'father_city' => 'nullable|string|max:255',
        ];

        $validated = $request->validate($rules);

        // Normalize checkbox booleans
        $validated['mother_unknown'] = $request->has('mother_unknown');
        $validated['father_unknown'] = $request->has('father_unknown');

        // Persist to database
        $family = FamilyInfo::create([
            'user_id' => session('id'),
            'marital_status' => $validated['marital_status'],

            'mother_unknown' => $validated['mother_unknown'],
            'mother_firstname' => $validated['mother_firstname'] ?? null,
            'mother_middlename' => $validated['mother_middlename'] ?? null,
            'mother_lastname' => $validated['mother_lastname'] ?? null,
            'mother_dob' => $validated['mother_dob'] ?? null,
            'mother_us_citizen' => $validated['mother_us_citizen'] ?? null,
            'mother_country' => $validated['mother_country'] ?? null,
            'mother_city' => $validated['mother_city'] ?? null,

            'father_unknown' => $validated['father_unknown'],
            'father_firstname' => $validated['father_firstname'] ?? null,
            'father_middlename' => $validated['father_middlename'] ?? null,
            'father_lastname' => $validated['father_lastname'] ?? null,
            'father_dob' => $validated['father_dob'] ?? null,
            'father_us_citizen' => $validated['father_us_citizen'] ?? null,
            'father_country' => $validated['father_country'] ?? null,
            'father_city' => $validated['father_city'] ?? null,
        ]);

        return to_route('emergency-contact');
    }
}
