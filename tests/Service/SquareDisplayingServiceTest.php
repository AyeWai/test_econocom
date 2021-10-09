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

        return $squareDisplayingService;
     
    }
    /**
     * @depends testLoopToFifty
     */
    public function testColorsArray($squareDisplayingService){

        $colors = $squareDisplayingService->colorsArray($squareDisplayingService);

        $this->assertEquals('white', $colors[1]);
        $this->assertEquals('green', $colors[2]);
        $this->assertEquals('blue', $colors[4]);
        $this->assertEquals('yellow', $colors[15], 'Divisible par 3 et 5');
    }

}
?>