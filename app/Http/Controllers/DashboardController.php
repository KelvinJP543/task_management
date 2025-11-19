<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan perhitungan statistik.
     */
    public function index()
    {
        // 1. Total semua tugas
        $totalTasks = Task::count();

        // 2. Tugas yang sedang dikerjakan (In Progress)
        $inProgressTasks = Task::where('status', 'in-progress')->count();

        // 3. Tugas yang sudah selesai (Completed)
        $completedTasks = Task::where('status', 'completed')->count();

        // 4. Tugas yang tertunda (Pending)
        $pendingTasks = Task::where('status', 'pending')->count();

        // Data untuk dashboard
        $stats = [
            'total' => $totalTasks,
            'in_progress' => $inProgressTasks,
            'completed' => $completedTasks,
            'pending' => $pendingTasks,
        ];

        return view('dashboard.index', compact('stats'));
    }
}