<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        // 1. Filter Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 2. Search Judul
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Urutkan berdasarkan tanggal pembuatan terbaru
        $tasks = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date', 
            'status' => 'required|in:pending,in-progress,completed',
        ]);
        
        $validatedData['user_id'] = Auth::id(); 

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

   public function update(Request $request, Task $task)
{
    // Lakukan Validasi seperti biasa
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'status' => 'required|in:pending,in-progress,completed',
    ]);
    
    // 1. Ambil nilai status yang dijamin bersih
    $newStatus = $validatedData['status'];

    // 2. Hapus status dari validatedData, karena kita hanya ingin mengubah status
    unset($validatedData['status']); 

    // 3. Hanya update kolom 'status' secara eksplisit.
    // Ini adalah cara yang lebih aman untuk kolom ENUM
    $task->status = $newStatus; 
    
    // 4. Update field lainnya dan simpan perubahan
    $task->update($validatedData);
    $task->save(); // Menyimpan kembali task setelah update status

    // ATAU yang lebih ringkas (dan lebih direkomendasikan jika semua field diperbarui):
    // $task->update($validatedData); 
    
    // Coba yang lebih bersih:
    $task->update([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'due_date' => $validatedData['due_date'],
        'status' => $newStatus, // Menggunakan nilai yang dijamin dari validasi
    ]);


    return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui.');
}

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus.');
    }
}