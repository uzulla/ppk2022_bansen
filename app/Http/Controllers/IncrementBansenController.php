<?php

namespace App\Http\Controllers;

use App\Models\Bansen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

class IncrementBansenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Logger $logger): SymfonyResponse
    {
        try {
            $bansen = Bansen::insertOne();
        } catch (RuntimeException $e) {
            $logger->error("fatal: insert bansen failed. {$e->getMessage()}", ['error' => $e]);
            throw new ServiceUnavailableHttpException("fatal: insert bansen failed. {$e->getMessage()}");
        }

        $logger->notice("latest bansen no: {$bansen->id}");

        $next_url = route("latest_bansen");

        return new RedirectResponse($next_url);
    }
}
