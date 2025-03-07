<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function compute($i){
          $denoms=[1000,500,200,100,50,10,5,1];
          $break=[];
          foreach($denoms as $denom){
            if($i>=$denom){
                $break[$denom]=intdiv($i, $denom);
                $i%=$denom;
            }
          }

          $color =($i % 2 == 0)? 'blue' : 'green';

          return view('money.break', compact('break', 'i', 'color'));
    }
}
