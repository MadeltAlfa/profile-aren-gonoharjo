<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BusinessGroup;
use Illuminate\View\View;

class BusinessGroupController extends Controller
{
    public function index(): View
    {
        $group = BusinessGroup::first() ?? new BusinessGroup([
            'group_name' => 'Kelompok Tani Lestari Aren Gonoharjo',
            'description' => 'Kelompok tani terpadu yang memayungi pengrajin gula aren tradisional di kawasan Gonoharjo.',
            'structure_json' => []
        ]);

        return view('public.group', compact('group'));
    }
}
