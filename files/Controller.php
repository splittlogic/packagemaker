<?php

namespace [vendor]\[package]\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use [vendor]\[package]\[package];

class [package]Controller extends Controller
{


  public function index ()
  {

    $content = 'This is [vendor]/[package]'; 

    return view('[package]::blank', ['content' => $content]);

  }


}
