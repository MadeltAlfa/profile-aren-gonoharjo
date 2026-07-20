<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Artisan;
use Illuminate\View\View;

class ArtisanController extends Controller
{
    public function index(): View
    {
        $artisans = Artisan::orderBy('order_position', 'asc')->get();

        return view('public.artisans', compact('artisans'));
    }
}
