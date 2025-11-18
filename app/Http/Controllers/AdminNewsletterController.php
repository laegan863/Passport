<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;

class AdminNewsletterController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsletterSubscriber::query()->latest();

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('email', 'like', "%{$search}%");
        }

        $subscribers = $query->paginate(20);
        
        $statusCounts = [
            'all' => NewsletterSubscriber::count(),
            'active' => NewsletterSubscriber::where('status', 'active')->count(),
            'unsubscribed' => NewsletterSubscriber::where('status', 'unsubscribed')->count(),
        ];

        return view('admin.newsletter.index', compact('subscribers', 'statusCounts'));
    }

    public function destroy($id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->route('admin.newsletter.index')->with('success', 'Subscriber deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:active,unsubscribed'
        ]);

        $subscriber->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Subscriber status updated successfully.');
    }

    public function export(Request $request)
    {
        $query = NewsletterSubscriber::query();

        // Apply same filters as index
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('email', 'like', "%{$search}%");
        }

        $subscribers = $query->get();

        $filename = 'newsletter_subscribers_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($subscribers) {
            $file = fopen('php://output', 'w');
            
            // Add headers
            fputcsv($file, ['ID', 'Email', 'Status', 'IP Address', 'Subscribed Date']);
            
            // Add data
            foreach ($subscribers as $subscriber) {
                fputcsv($file, [
                    $subscriber->id,
                    $subscriber->email,
                    $subscriber->status,
                    $subscriber->ip_address,
                    $subscriber->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
