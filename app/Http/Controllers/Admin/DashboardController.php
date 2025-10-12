<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        
        // Count users with completed profile and a submitted but unapproved payment
        $pendingReviewsCount = User::where('registration_stage', 'completed')
            ->whereHas('payments', function ($query) {
                $query->where('status', 'submitted');
            })
            ->count();

        $stats = [
            'total_students' => User::count(),
            'completed_profiles' => User::where('registration_stage', 'completed')->count(),
            'pending_reviews' => $pendingReviewsCount,
            'total_payments' => Payment::where('status', 'success')->sum('amount'),
        ];

        // Get registration status data for chart
        $completedCount = User::where('registration_stage', 'completed')->count();
        $uncompletedCount = User::where('registration_stage', '!=', 'completed')->count();
        
        $registrationData = [
            'completed' => $completedCount,
            'uncompleted' => $uncompletedCount
        ];

        return view('admin.dashboard', compact('stats', 'admin', 'registrationData'));
    }
}