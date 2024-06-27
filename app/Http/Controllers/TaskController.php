<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function create()
    {
        return view('pages.home.create', ['title' => 'Add Task']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'deadline' => 'required|date',
            'title' => 'required|string|max:255',
            'priority' => 'required|int',
            'is_done.*' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $task = Task::create([
                'deadline' => Carbon::parse($request->deadline),
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'priority' => $request->priority,
                'is_done' => $request->is_done
            ]);

            return redirect('/home')->with('success', 'Task successfully added!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Add task failed!');
        }
    }

    public function edit($id)
    {
        $task = Task::where('id', $id)->first();
        return view('pages.home.edit', ['title' => 'Edit Task', 'task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'deadline' => 'required|date',
            'title' => 'required|string|max:255',
            'priority' => 'required|int',
            'is_done.*' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $task = Task::where('id', $id)->update([
                'deadline' => Carbon::parse($request->deadline),
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'priority' => $request->priority,
                'is_done' => $request->is_done
            ]);

            return redirect('/home')->with('success', 'Task successfully updated!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Update task failed!');
        }
    }

    public function deadlineToday(Request $request)
    {
        $queryToday = Task::whereDate('deadline', Carbon::today());

        if (isset($request->keyword)) {
            $queryToday->where('title', 'like', '%' . $request->keyword . '%');
        }

        if ($request->order_by_deadline) {
            $queryToday->orderBy('deadline', $request->order_by_deadline);
        }

        if ($request->order_by_title) {
            $queryToday->orderBy('title', $request->order_by_title);
        }

        if ($request->order_by_priority) {
            $queryToday->orderBy('priority', $request->order_by_priority);
        }

        $tasks = $queryToday->paginate(5);
        return view('pages.home.all_deadline_today', [
            'tasks' => $tasks,
            'title' => 'Deadline Today'
        ]);
    }

    public function delete($id)
    {
        $task = Task::where('id', $id)->first();
        $task->delete();

        return back();
    }

    public function isDoneTask($id)
    {
        $task = Task::select('is_done')->where('id', '=', $id)->first();

        if ($task->is_done == '1') {
            $is_done = '0';
        } else {
            $is_done = '1';
        }

        $values = array('is_done' => $is_done);
        Task::where('id', $id)->update($values);

        return back();
    }
}