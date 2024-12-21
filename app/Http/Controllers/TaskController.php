<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(5); // Hiển thị 10 bản ghi mỗi trang
        return view('tasks.index', compact('tasks'));

    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);


    $data = $request->all();
    $data['completed'] = $request->has('completed') ? 1 : 0;


    Task::create($data);


    return redirect()->route('tasks.index')->with('success', 'Task created successfully');
}

    public function show(Task $task)
    {
        return view('tasks.show',compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
    }

    public function update(Request $request, $id)
{

    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);


    $task = Task::findOrFail($id);

    $data = $request->all();
    $data['completed'] = $request->has('completed') ? 1 : 0;
    $task->update($data);
    return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
}


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task delete successfully');
    }
}
