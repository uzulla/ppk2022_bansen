<?php

namespace App\Http\Controllers;

use App\Models\Bansen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LatestBansenController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $bansen = Bansen::getLatestOne();

        if (is_null($bansen)) {
            throw new NotFoundHttpException('NotFound latest bansen');
        }

        $view = view('latest_bansen', [
            'latest_bansen_no' => $bansen->id
        ]);

        return new Response($view->render());
    }
}
