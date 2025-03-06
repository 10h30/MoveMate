<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index() {
        $task = Task::latest('updated_at')->Paginate(20);
        return view('task.index', [
            'tasks' => $task
        ]);
    }

    public function show(Task $task) {
        return view('task.show', [
            'task' => $task
        ]);
    }

    public function create() {
        $categories = Category::all();
        return view('task.create', [
            'categories' => $categories
        ]);
    }

    public function store(Task $task) {
        $validatedAtts = request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'location' => ['required'],
            'time_estimate' => ['required'],
        ]);
      
        $validatedAtts['user_id'] = Auth::id();
    
        $task = Task::create(
            $validatedAtts
        );
    
        return redirect()->route('task.create')->with('success', 'Task created successfully!');
    }

    public function edit(Task $task) {
        $categories = Category::all();
        return view('task.edit', [
            'task' => $task,
            'categories' => $categories
        ]);
    }
    
    public function update(Task $task) {
        $validatedAtts = request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required'],
            'location' => ['required'],
            'time_estimate' => ['required'],
        ]);
        
        $task->update($validatedAtts);
    
        return redirect('/task/'.$task->id);
        
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted successfully');
    }

}
