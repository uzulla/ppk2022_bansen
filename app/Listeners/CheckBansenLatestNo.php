<?php

namespace App\Listeners;

use App\Events\BansenIncremented;
use Illuminate\Log\Logger;

class CheckBansenLatestNo
{

    protected Logger $logger;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\BansenIncremented $event
     * @return void
     */
    public function handle(BansenIncremented $event)
    {
        if (($event->bansen_no % 2) === 0) {
            $this->logger->notice("No is even num now :{$event->bansen_no}");
        }
    }
}
