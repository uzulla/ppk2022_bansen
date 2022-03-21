<?php

namespace App\Http\Controllers;

use App\Models\Bansen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class IncrementBansenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): SymfonyResponse
    {
        $bansen = Bansen::insertOne();

        $next_url = route("latest_bansen");

        return new RedirectResponse($next_url);
    }
}
