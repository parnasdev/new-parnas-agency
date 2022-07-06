<?php

namespace Packages\academy\src\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Packages\academy\src\Models\Learning;
use Packages\academy\src\Models\Season;

class CheckHasLearning
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
        abort_if(!auth()->check() , 401 , 'شما ورود به سایت نکرده اید');
        $course = Post::findBySlug($request->route('course'));
        $season = $course->seasons()->where('slug' ,$request->route('season'))->firstOrFail();
        $learning = user()->learnings()->latest()->where('expire' , '>=' , now())->where('post_id' , $course->id)->firstOrFail();
        abort_if(!$season->free && !in_array($season->id, $learning->season_unlock ?? []) , 403 , 'شما به این صفحه دسترسی ندارید.');

        return $next($request);
    }
}
