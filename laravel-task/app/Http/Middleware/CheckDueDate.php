<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDueDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $task =$request->route('task');
        if($task->due_date < now()){
            return redirect()->route('tasks.index')->withErrors(['Task Due date has passed']);
        }
        return $next($request);
    }
}
