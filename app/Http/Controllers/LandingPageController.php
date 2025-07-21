<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->where('status', '!=', 'draft')->get();
        return view('landing-page', compact('products'));
    }
}
