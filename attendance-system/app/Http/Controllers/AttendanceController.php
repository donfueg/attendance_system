<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::where('user_id', Auth::id())->get();
        return view('dashboard', compact('attendances'));
    }

    public function checkIn(Request $request)
    {
        Attendance::create([
            'user_id' => Auth::id(),
            'date' => now()->toDateString(),
            'check_in' => now()->toTimeString()
        ]);

        return redirect()->back()->with('success', 'Checked in successfully');
    }

    public function checkOut(Request $request)
    {
        $attendance = Attendance::where('user_id', Auth::id())
            ->where('date', now()->toDateString())
            ->first();

        if ($attendance) {
            $attendance->update(['check_out' => now()->toTimeString()]);
            return redirect()->back()->with('success', 'Checked out successfully');
        }

        return redirect()->back()->with('error', 'Check-in first');
    }
}
