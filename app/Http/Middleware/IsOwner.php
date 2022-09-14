<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $model)
    {
    // dd($model);
    //     if (auth()->user()->is_admin == 0) {
    //         return redirect('/');
    //     }
    //     return $next($request);
        
        switch ($model) {
            case 'session':
                if(auth()->user()->is_admin == 1 or auth()->user()->id == auth()->user()->sessions()->patient()->first()->user_id)
                {  
                    $patient = Patient::your_patients()->get();
                    return view('sessions.edit', compact('patient', 'session'));
                }
                break;
            // case 2:
            //     echo "i equals 2";
            //     break;
            default:
               echo "i is not equal to 0, 1 or 2";
        }
          
    }
}
