<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblpersonalinfo;
use App\Models\Tblcontactinfo;
use App\Models\Tblpassportdetail;
use App\Models\Tblemergencycontact;
use App\Models\Tbltravelplan;
use App\Models\Tblverification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display admin dashboard with statistics
     */
    public function dashboard()
    {
        // Today's statistics
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $stats = [
            'today' => [
                'total' => Tblpersonalinfo::whereDate('created_at', $today)->count(),
                'pending' => Tblpersonalinfo::whereDate('created_at', $today)->where('status', 'pending')->count(),
                'abandoned' => Tblpersonalinfo::whereDate('created_at', $today)->where('status', 'abandoned')->count(),
                'successful' => Tblpersonalinfo::whereDate('created_at', $today)->where('status', 'successful')->count(),
                'completed' => Tblpersonalinfo::whereDate('created_at', $today)->where('status', 'completed')->count(),
            ],
            'yesterday' => [
                'total' => Tblpersonalinfo::whereDate('created_at', $yesterday)->count(),
                'pending' => Tblpersonalinfo::whereDate('created_at', $yesterday)->where('status', 'pending')->count(),
                'abandoned' => Tblpersonalinfo::whereDate('created_at', $yesterday)->where('status', 'abandoned')->count(),
                'successful' => Tblpersonalinfo::whereDate('created_at', $yesterday)->where('status', 'successful')->count(),
                'completed' => Tblpersonalinfo::whereDate('created_at', $yesterday)->where('status', 'completed')->count(),
            ],
            'all_time' => [
                'total' => Tblpersonalinfo::count(),
                'pending' => Tblpersonalinfo::where('status', 'pending')->count(),
                'abandoned' => Tblpersonalinfo::where('status', 'abandoned')->count(),
                'successful' => Tblpersonalinfo::where('status', 'successful')->count(),
                'completed' => Tblpersonalinfo::where('status', 'completed')->count(),
            ],
        ];

        // Last 7 days chart data
        $last7Days = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $last7Days[] = [
                'date' => $date->format('M d'),
                'pending' => Tblpersonalinfo::whereDate('created_at', $date)->where('status', 'pending')->count(),
                'abandoned' => Tblpersonalinfo::whereDate('created_at', $date)->where('status', 'abandoned')->count(),
                'successful' => Tblpersonalinfo::whereDate('created_at', $date)->where('status', 'successful')->count(),
                'completed' => Tblpersonalinfo::whereDate('created_at', $date)->where('status', 'completed')->count(),
            ];
        }

        // Application types breakdown
        $applicationTypes = Tblpersonalinfo::select('application_type', DB::raw('count(*) as total'))
            ->groupBy('application_type')
            ->get();

        // Recent applications
        $recentApplications = Tblpersonalinfo::with(['contactInfo', 'emergencyContact'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'last7Days', 'applicationTypes', 'recentApplications'));
    }

    /**
     * Display orders list with filtering
     */
    public function orders(Request $request)
    {
        $query = Tblpersonalinfo::with(['contactInfo', 'emergencyContact']);

        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        // Search by name or email
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by application type
        if ($request->has('type') && $request->type != 'all') {
            $query->where('application_type', $request->type);
        }

        // Filter by date range
        if ($request->has('date_from') && $request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->has('date_to') && $request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $orders = $query->paginate(15)->withQueryString();

        // Status counts for filter badges
        $statusCounts = [
            'all' => Tblpersonalinfo::count(),
            'pending' => Tblpersonalinfo::where('status', 'pending')->count(),
            'abandoned' => Tblpersonalinfo::where('status', 'abandoned')->count(),
            'successful' => Tblpersonalinfo::where('status', 'successful')->count(),
            'completed' => Tblpersonalinfo::where('status', 'completed')->count(),
        ];

        return view('admin.orders.index', compact('orders', 'statusCounts'));
    }

    /**
     * Show order details
     */
    public function orderShow($id)
    {
        $order = Tblpersonalinfo::with([
            'contactInfo',
            'passportDetail',
            'emergencyContact',
            'travelPlan',
            'verification',
            'familyInfo'
        ])->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update order status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,abandoned,successful,completed'
        ]);

        $order = Tblpersonalinfo::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    /**
     * Delete order
     */
    public function orderDelete($id)
    {
        $order = Tblpersonalinfo::findOrFail($id);
        $order->delete(); // Cascade delete will handle related records

        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully!');
    }

    /**
     * Bulk delete orders
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'order_ids' => 'required|array',
            'order_ids.*' => 'exists:tblpersonalinfos,id'
        ]);

        Tblpersonalinfo::whereIn('id', $request->order_ids)->delete();

        return redirect()->back()->with('success', count($request->order_ids) . ' orders deleted successfully!');
    }

    /**
     * Export orders to CSV
     */
    public function exportOrders(Request $request)
    {
        $query = Tblpersonalinfo::with(['contactInfo', 'emergencyContact']);

        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        $orders = $query->get();

        $filename = 'passport_applications_' . date('Y-m-d_His') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($orders) {
            $file = fopen('php://output', 'w');
            
            // Headers
            fputcsv($file, [
                'ID', 'Application Type', 'Status', 'First Name', 'Last Name', 
                'Email', 'Phone', 'State', 'City', 'Created At'
            ]);

            // Data
            foreach ($orders as $order) {
                fputcsv($file, [
                    $order->id,
                    $order->application_type,
                    $order->status,
                    $order->first_name,
                    $order->last_name,
                    $order->email,
                    $order->contactInfo->primary_phone ?? 'N/A',
                    $order->contactInfo->state ?? 'N/A',
                    $order->contactInfo->city ?? 'N/A',
                    $order->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
