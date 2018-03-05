<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todolist;
use Auth;

class TodolistController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('protectPrivateTodolist', ['only' => [
          'show'
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolists = Todolist::with('user')->where('private', false)->orWhere('user_id', Auth::id())->get();
        return view('todolists.index', ['todolists' => $todolists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Todolist::create([
          'name' => $request->name,
          'private' => is_null($request->private) ? 0 : $request->private,
          'user_id' => Auth::id()
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todolist = Todolist::find($id);
        return view('todolists.show', ['todolist' => $todolist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
