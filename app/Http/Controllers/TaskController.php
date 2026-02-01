<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index()
    { // list tasks for the logged-in user
        $tasks = Task::where('user_id', Session::get('user_id'))->get(); //retrieve tasks for the logged-in user
        return view('tasks.index', compact('tasks')); //makes $tasks available in the view
    }

    public function create()
    { // show create task form
        return view('tasks.create');
    }

    public function store(Request $request)
    { // create new task
        $request->validate([
            'title' => 'required|string|max:255', //validate input data
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
        ]);
        // create new task associated with logged-in user
        Task::create([
            'user_id' => Session::get('user_id'),
            'title' => $request->title, //get 'title' input from request
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect('/tasks')->with('success', 'Task created successfully!'); //REDIRECT to tasks list
    }

    public function update(Request $request, $id)
    { // update task
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
        ]);

        $task = Task::find($id); //retrieve task by id
        if ($task && $task->user_id == Session::get('user_id')) { //check if task exists and belongs to logged-in user
            $task->title = $request->title;
            $task->description = $request->description;
            $task->status = $request->status;
            $task->save(); //save changes to DB
        }
        return redirect('/tasks')->with('success', 'Task updated successfully!'); //REDIRECT to tasks list
    }

    public function edit($id)
    { // show edit form for a task
        $task = Task::find($id); //retrieve task by id
        if ($task && $task->user_id == Session::get('user_id')) { //check if task exists and belongs to logged-in user
            return view('tasks.edit', compact('task')); //makes $task available in the view
        }
        return redirect('/tasks'); //REDIRECT to tasks list if task not found or unauthorized
    }

    public function destroy($id)
    { // delete a task
        $task = Task::find($id); //retrieve task by id
        if ($task && $task->user_id == Session::get('user_id')) { //check if task exists and belongs to logged-in user
            $task->delete(); //delete task from DB
        }
        return redirect('/tasks'); //REDIRECT to tasks list
    }
}
