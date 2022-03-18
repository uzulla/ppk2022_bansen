<?php

namespace App\Console\Commands;

use App\Models\BanBanSenSen;
use App\Models\Bansen;
use Illuminate\Console\Command;

class GetLatestBansenNo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bansen:get_latest_no';

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
        $bansen = Bansen::query()->orderBy('id', 'desc')->limit(1)->get();

        echo $bansen->first()->id;


        return 0;
    }
}
