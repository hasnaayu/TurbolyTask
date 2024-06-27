<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index(Request $request)
    // {
    //     if (isset($request->keyword) && $request->order_by_deadline != '' && $request->order_by_title != '' && $request->order_by_priority != '') {
    //         $deadline_today = Task::where('deadline', Carbon::today())
    //             ->where('title', 'like', '%' . $request->keyword . '%')
    //             ->orderBy('deadline', $request->order_by_deadline)
    //             ->orderBy('title', $request->order_by_title)
    //             ->orderBy('priority', $request->order_by_priority)
    //             ->get();
    //         $tasks = Task::where('deadline', '>', Carbon::today())
    //             ->where('title', 'like', '%' . $request->keyword . '%')
    //             ->orderBy('deadline', $request->order_by_deadline)
    //             ->orderBy('title', $request->order_by_title)
    //             ->orderBy('priority', $request->order_by_priority)
    //             ->paginate(5);
    //         $expired = Task::where('deadline', '<', Carbon::today())
    //             ->where('title', 'like', '%' . $request->keyword . '%')
    //             ->orderBy('deadline', $request->order_by_deadline)
    //             ->orderBy('title', $request->order_by_title)
    //             ->orderBy('priority', $request->order_by_priority)
    //             ->paginate(5);
    //     } else {
    //         $deadline_today = Task::orderBy('priority', 'ASC')
    //             ->where('deadline', Carbon::today())
    //             ->get();
    //         $tasks = Task::orderBy('created_at', 'DESC')
    //             ->where('deadline', '>', Carbon::today())
    //             ->paginate(5);
    //         $expired = Task::orderBy('created_at', 'DESC')
    //             ->where('deadline', '<', Carbon::today())
    //             ->paginate(5);
    //     }
    //     return view('pages.home.index', [
    //         'tasks' => $tasks,
    //         'deadline_today' => $deadline_today,
    //         'expired' => $expired,
    //         'title' => 'Home Page'
    //     ]);
    // }

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

        if ($request->order_by_priority) {
            $queryToday->orderBy('priority', $request->order_by_priority);
            $queryFuture->orderBy('priority', $request->order_by_priority);
            $queryExpired->orderBy('priority', $request->order_by_priority);
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
