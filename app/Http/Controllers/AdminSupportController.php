<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportContact;
use Illuminate\Support\Facades\Validator;

class AdminSupportController extends Controller
{
    public function index(Request $request)
    {
        $query = SupportContact::query()->latest();

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $contacts = $query->paginate(15);
        
        $statusCounts = [
            'all' => SupportContact::count(),
            'new' => SupportContact::where('status', 'new')->count(),
            'in-progress' => SupportContact::where('status', 'in-progress')->count(),
            'resolved' => SupportContact::where('status', 'resolved')->count(),
            'closed' => SupportContact::where('status', 'closed')->count(),
        ];

        return view('admin.support.index', compact('contacts', 'statusCounts'));
    }

    public function show($id)
    {
        $contact = SupportContact::findOrFail($id);
        return view('admin.support.show', compact('contact'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:new,in-progress,resolved,closed',
            'admin_notes' => 'nullable|string|max:5000'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $contact = SupportContact::findOrFail($id);
        $contact->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return back()->with('success', 'Support ticket updated successfully.');
    }

    public function destroy($id)
    {
        $contact = SupportContact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.support.index')->with('success', 'Support ticket deleted successfully.');
    }
}
