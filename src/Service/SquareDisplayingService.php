<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SquareDisplayingService extends AbstractController{

    public function loopToFifty(){

        $array = range(1,50);
        return $array;
     
    }

    public function colorsArray(SquareDisplayingService $squareDisplayingService){

        $number = $squareDisplayingService->loopToFifty();
        $colors = [];

        for ($i=0; $i < count($number); $i++) { 
           if ($number[$i] % 3 == 0 && $number[$i] % 5 == 0){
               array_push($colors, 'yellow');
           }elseif($number[$i] % 3 == 0 && $number[$i] % 5 != 0){
                array_push($colors, 'green');
           }elseif($number[$i] % 3 != 0 && $number[$i] % 5 == 0){
                array_push($colors, 'blue');
           }else{
            array_push($colors, 'white');
           }
        }

        return $colors;
    }

    public function colorOne(SquareDisplayingService $squareDisplayingService, int $number){

        $colors = $squareDisplayingService->colorsArray($squareDisplayingService);

        return $colors[$number];
    }

}
?>