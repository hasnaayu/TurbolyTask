<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $queryToday = Task::whereDate('deadline', Carbon::today());
        $queryFuture = Task::whereDate('deadline', '>', Carbon::today());
        $queryExpired = Task::whereDate('deadline', '<', Carbon::today());

        if (isset($request->keyword)) {
            $queryToday->where('title', 'like', '%' . $request->keyword . '%');
            $queryFuture->where('title', 'like', '%' . $request->keyword . '%');
            $queryExpired->where('title', 'like', '%' . $request->keyword . '%');
        }

        if ($request->order_by_deadline) {
            $queryToday->orderBy('deadline', $request->order_by_deadline);
            $queryFuture->orderBy('deadline', $request->order_by_deadline);
            $queryExpired->orderBy('deadline', $request->order_by_deadline);
        }

        if ($request->order_by_title) {
            $queryToday->orderBy('title', $request->order_by_title);
            $queryFuture->orderBy('title', $request->order_by_title);
            $queryExpired->orderBy('title', $request->order_by_title);
        }

        if ($request->order_by_priority == 'low') {
            $queryToday->where('priority', '<=', 2);
            $queryFuture->where('priority', '<=', 2);
            $queryExpired->where('priority', '<=', 2);
        } elseif ($request->order_by_priority == 'med') {
            $queryToday->where('priority', '>', 2)->orWhere('priority', '<', 10);
            $queryFuture->where('priority', '>', 2)->orWhere('priority', '<', 10);
            $queryExpired->where('priority', '>', 2)->orWhere('priority', '<', 10);
        } elseif ($request->order_by_priority == 'high') {
            $queryToday->where('priority', '>=', 10);
            $queryFuture->where('priority', '>=', 10);
            $queryExpired->where('priority', '>=', 10);
        } else {
            $queryToday->get();
            $queryFuture->paginate(5);
            $queryExpired->paginate(5);
        }

        $deadline_today = $queryToday->get();
        $tasks = $queryFuture->paginate(5);
        $expired = $queryExpired->paginate(5);

        return view('pages.home.index', [
            'tasks' => $tasks,
            'deadline_today' => $deadline_today,
            'expired' => $expired,
            'title' => 'Home Page'
        ]);
    }
}
