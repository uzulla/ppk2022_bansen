<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SpawnPoem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'poem:spawn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Spawn some poem';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::insert('insert into item (poem) values (?)', ["PHPer's poem"]);

        return 0;
    }
}
