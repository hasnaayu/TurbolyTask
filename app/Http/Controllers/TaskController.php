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
                'is_done' => $request->is_done
            ]);

            return redirect('/home')->with('success', 'Task successfully added!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Add task failed!');
        }
    }
}
