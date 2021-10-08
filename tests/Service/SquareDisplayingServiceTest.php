<?php

namespace App\Tests;

use App\Service\SquareDisplayingService;
use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SquareDisplayingServiceTest extends KernelTestCase{

    private $squareDisplayingService; 

    public function testLoopToFifty(){

        $kernel = new Kernel('env',true);
        $kernel->boot();
        $container = $kernel->getContainer();

        // this line is important ↓
        $squareDisplayingService = $container->get(SquareDisplayingService::class);

        $array = $squareDisplayingService->loopToFifty();
        $this->assertCount(50, $array);
        $this->assertEquals(range(1,50), $array);
     
    }

}
?>