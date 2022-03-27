<?php

namespace App\Console\Commands;

use App\Models\Bansen;
use Illuminate\Console\Command;

class IncrementBansens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bansen:increment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Bansen::insertOne();

        return 0;
    }
}
