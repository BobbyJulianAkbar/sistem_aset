<?php

namespace App\Http\Controllers;
use App\Models\pemasukanModel;
use App\Models\klienModel;
use App\Models\propertiModel;


use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home()
    {
        return view('home');
    }
}
