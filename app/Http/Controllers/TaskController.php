<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('status')->get();
        return view('admin.todo.todo', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = [
            [
                'label' => 'Urgent',
                'value' => 'Urgent',
            ],
            [
                'label' => 'Important',
                'value' => 'Important',
            ],
            [
                'label' => 'General',
                'value' => 'General',
            ]
        ];
        return view('admin.todo.addtodo', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->desc = $request->desc;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $task = Task::find($id);
        $statuses = [
            [
                'label' => 'General',
                'value' => 'General',
            ],
            [
                'label' => 'Urgent',
                'value' => 'Urgent',
            ],
            [
                'label' => 'Important',
                'value' => 'Important',
            ]
        ];
        return view('admin.todo.edittodo', compact('statuses', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return redirect()->route('index')->with('success', 'Data is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('index')->with('success', 'Data is successfully deleted.');
    }
}
