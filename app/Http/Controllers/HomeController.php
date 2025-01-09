<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    public function HomeMain()
    {

        $props = Property::where('is_active', '1')->latest()->paginate(21);
        return view('frontend.index', compact('props'));
    } // end mehtod 
}
