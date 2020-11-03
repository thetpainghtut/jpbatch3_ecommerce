<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class FrontendController extends Controller
{
  public function main($value='')
  {
    $items = Item::all();
    return view('frontend.mainpage',compact('items'));
  }
}
