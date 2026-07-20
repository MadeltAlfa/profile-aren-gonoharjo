<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->input('category');

        $query = Product::where('is_active', true);

        if ($category && $category !== 'semua') {
            $query->where('category', $category);
        }

        $products = $query->get();

        return view('public.products', compact('products', 'category'));
    }
}
