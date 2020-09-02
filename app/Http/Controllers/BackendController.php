<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashboardfun($value='')
    {
    	// $route = Route::current();
    	// dd($route);
    	return view('backend.dashboard');
    }
     public function itemsfun($value='')
    {
    	
    	return view('backend.items.create');
    }
     public function indexfun($value='')
    {
    	
    	return view('backend.items.index');
    }
     public function brandfun($value='')
    {
        
        return view('backend.brands.index');
    }

    
}
