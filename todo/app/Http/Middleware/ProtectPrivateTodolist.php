<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Todolist;

class ProtectPrivateTodolist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $todolist = Todolist::findOrFail($request->route('todolist'));
        if ($todolist->private && ($todolist->user->id != Auth::id())) {
          abort(404);
        }

        return $next($request);
    }
}
