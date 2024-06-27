<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $deadline_today = Task::where('deadline', Carbon::today())->get();
        $tasks = Task::orderBy('created_at', 'ASC')
            ->paginate(5);
        return view('pages.home.index', [
            'tasks' => $tasks,
            'deadline_today' => $deadline_today,
            'title' => 'Home Page'
        ]);
    }
}
