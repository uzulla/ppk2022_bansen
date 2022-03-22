<?php

namespace App\Http\Controllers;

use App\Models\Bansen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Log\Logger;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LatestBansenController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Logger $logger
     * @return Response
     */
    public function __invoke(Request $request, Logger $logger): Response
    {
        $bansen = Bansen::getLatestOne();

        if (is_null($bansen)) {
            $logger->notice("not found bansen");
            throw new NotFoundHttpException('NotFound latest bansen');
        }

        $view = view('latest_bansen', [
            'latest_bansen_no' => $bansen->id
        ]);

        return new Response($view->render());
    }
}
