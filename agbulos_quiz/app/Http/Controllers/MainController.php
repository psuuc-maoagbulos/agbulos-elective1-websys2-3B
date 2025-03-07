<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function multiply($i){
          

          for($i =1; ($i) >=10;  $i++)

          
          
            
          return view('blog/display')->with('i',$i);
    }
}
