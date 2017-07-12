<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spacebox;

class IndexController extends Controller
{
    public function returnView()
    {
        $spaceboxes = Spacebox::where('active', 1)
                                ->where('visible', 1)
                                ->get();
                                
        $spaceboxes = $spaceboxes->shuffle();

        return view('index', ['title' => 'Inicio'])->with('spaceboxes', $spaceboxes);
    }
}
