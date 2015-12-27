<?php namespace Modules\Module\Http\Middleware;

class GuardSubmittedModules
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if ($request->singleModule->isInReview()) {
            return redirect()->route('p.modules.index')->with('warning', 'You cannot edit a module in review.');
        }

        return $next($request);
    }
}
