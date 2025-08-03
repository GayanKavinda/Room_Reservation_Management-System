<?php
// app/Http/Middleware/ScopeBouncer.php
namespace App\Http\Middleware;

use Closure;
use Silber\Bouncer\Bouncer;

class ScopeBouncer
{
    protected $bouncer;

    public function __construct(Bouncer $bouncer)
    {
        $this->bouncer = $bouncer;
    }

    public function handle($request, Closure $next)
    {
        if ($request->user()) {
            $tenantId = $request->user()->account_id ?? 1; // Fallback to 1 if account_id is null
            $this->bouncer->scope()->to($tenantId);
        }

        return $next($request);
    }
}