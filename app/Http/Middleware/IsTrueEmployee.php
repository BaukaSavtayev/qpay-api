<?php

namespace App\Http\Middleware;

use App\Models\Business;
use App\Models\Employee;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class IsTrueEmployee
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
        if ($user->userable_type == Business::class){
            return $next($request);
        }
        if ($user->userable_type == Employee::class){
            if ($user->userable_id == $request->employee->id){
                return $next($request);
            }
        }
        return redirect('/');



    }
}
