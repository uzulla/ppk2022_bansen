<?php

namespace App\Listeners;

use App\Events\BansenIncremented;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Log\Logger;
use Illuminate\Queue\InteractsWithQueue;

class EmergLogBansenIncrement
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
     * @param  \App\Events\BansenIncremented  $event
     * @return void
     */
    public function handle(BansenIncremented $event)
    {
        $this->logger->emergency("WOW!! incremented!!! :{$event->bansen_no}");
    }
}
