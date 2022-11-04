<?php

namespace App\Http\Middleware;

use App\Models\Business;
use App\Models\Employee;
use Closure;
use Illuminate\Http\Request;

class IsBusinessEmployeeOrOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ($user->userable_type == Employee::class)
        {
            if ($user->userable->business->id != $request->business->id){
                return redirect('/');
            }
        }
        elseif ($user->userable_type == Business::class)
        {
            if ($user->userable_id != $request->business->id) {
                return redirect('/');
            }
        }
        else
        {
            return redirect('/');
        }
        return $next($request);
    }
}
