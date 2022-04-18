<?php

namespace Tests\Feature;

use App\Models\Bansen;
use App\Service\BansenService;
use Tests\TestCase;

class EloqentTest extends TestCase
{
    public function testSomething()
    {
        $bansen = BansenService::getById(1);
        var_dump($bansen->user()->name);
    }
}
