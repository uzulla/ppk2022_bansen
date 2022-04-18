<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NudgeNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Log\Logger;

class PingMeController extends Controller
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
        /** @var User $current_user */
        $current_user = $request->user();
        if (!is_null($current_user)) {
            $noticication_instance = new NudgeNotification();
            $current_user->notifyNow($noticication_instance);
            $logger->notice("notification sent.");
        } else {
            $logger->notice("missing user.");
        }

        return new Response('done');
    }
}
