<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admission;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(\App\Http\Middleware\AdminMiddleware::class);
    }

    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        $data = [
            'totalNotices' => Notice::count(),
            'totalUsers' => User::count(),
            'totalAdmissions' => Admission::count(),
            'importantNotices' => Notice::where('is_important', true)->count(),
            'recentNotices' => Notice::latest()->take(5)->get(),
            'recentAdmissions' => Admission::latest()->take(5)->get()
        ];

        return view('admin.dashboard', $data);
    }

    /**
     * Show the users list.
     */
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    /**
     * Toggle user status (activate/deactivate)
     */
    public function toggleUserStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();

        return redirect()->back()->with('success', 'User status updated successfully');
    }

    /**
     * Update user details
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'is_admin' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update($request->all());

        return redirect()->back()->with('success', 'User updated successfully');
    }

    /**
     * Export users data
     */
    public function exportUsers(Request $request)
    {
        $format = $request->get('format', 'csv');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $query = User::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $users = $query->get();

        switch ($format) {
            case 'excel':
                return $this->exportToExcel($users);
            case 'pdf':
                return $this->exportToPdf($users);
            default:
                return $this->exportToCsv($users);
        }
    }

    /**
     * Export to CSV
     */
    private function exportToCsv($users)
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ];

        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');
            
            // Add headers
            fputcsv($file, ['Name', 'Email', 'Role', 'Registered Date']);
            
            // Add data
            foreach ($users as $user) {
                fputcsv($file, [
                    $user->name,
                    $user->email,
                    $user->is_admin ? 'Admin' : 'User',
                    $user->created_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Export to Excel
     */
    private function exportToExcel($users)
    {
        // You'll need to implement Excel export using a package like Laravel Excel
        // This is a placeholder for the Excel export functionality
        return redirect()->back()->with('error', 'Excel export not implemented yet');
    }

    /**
     * Export to PDF
     */
    private function exportToPdf($users)
    {
        // You'll need to implement PDF export using a package like DomPDF
        // This is a placeholder for the PDF export functionality
        return redirect()->back()->with('error', 'PDF export not implemented yet');
    }

    /**
     * Show the admissions list.
     */
    public function admissions()
    {
        $admissions = Admission::latest()->get();
        return view('admin.admissions.index', compact('admissions'));
    }

    /**
     * Delete an admission record.
     */
    public function deleteAdmission($id)
    {
        $admission = Admission::findOrFail($id);
        $admission->delete();
        return redirect()->route('admin.admissions')->with('success', 'Admission record deleted successfully');
    }
} 