<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Log\Logger;

class AddPoweredByAndSteamRequestMiddleware
{
    protected Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $this->logger->notice("dump request" . print_r($request->all(), true));

        /** @var Response|RedirectResponse $response */
        $response = $next($request);

        $response->headers->add([
            'X-Powered-By' => 'laravel 9'
        ]);

        return $response;
    }
}
