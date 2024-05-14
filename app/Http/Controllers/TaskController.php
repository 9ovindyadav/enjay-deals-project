<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Deal $deal)
    {
        return view('deals.tasks',['deal' => $deal]);
    }    

    public function create(Deal $deal)
    {
        return view('task.create',['deal' => $deal]);
    }

    public function store(Deal $deal)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'max:255',
            'comment' => 'max:255',
            'deal_id' => 'required|numeric'
        ]);

        Task::create($attributes);
        
        return redirect('/deal/'.$deal->id.'/tasks')->with('success','Task created successfully');
    }

    public function edit(Task $task)
    {
        // ddd($task->description);
        return view('task.edit',['task' => $task]);
    }

    public function update(Task $task)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'max:255',
            'comment' => 'max:255'
        ]);

        $task->update($attributes);
        
        return redirect('/deal/'.$task->deal_id.'/tasks')->with('success','Task updated successfully');
    }

    public function delete()
    {
        $attribute = request()->validate([
            'task_id' => 'required|numeric'
        ]);

        $task = Task::find($attribute['task_id']);
        $task->delete();

        return redirect('/deal/'.$task->deal_id.'/tasks')->with('success','Task Deleted successfully');
    }
}
