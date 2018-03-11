<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::with('user')->get();
        return view('home', [ 'todos' => $todos ]);
    }

    public function create($id)
    {
      $todo = new Todo();
      return view('add', [ 'todo' => $todo, 'todolist_id' => $id ]);
    }

    public function store(Request $request)
    {
      Todo::create([
        'desc' => $request->desc,
        'user_id' => \Auth::user()->id,
        'todolist_id' => $request->todolist_id
      ]);
      return redirect('/todolists/' . $request->todolist_id);
    }

    public function toggle(Request $request)
    {
      $todo = Todo::find($request->id);
      $todo->status = !$todo->status;
      $todo->save();

      return redirect('/todolists/' . $request->todolist_id);
    }
}
