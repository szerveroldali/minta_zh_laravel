<?php

namespace App\Http\Controllers;

use App\Models\Sighting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class SightingController extends Controller
{
    private const CRAFT_TYPES = [
        'disk' => 'Flying disk',
        'triangle' => 'Black triangle',
        'light' => 'Strange lights',
        'other' => 'Other',
    ];

    public function home(): View
    {
        return view('home');
    }

    public function index(): View
    {
        return view('sightings.index');
    }

    public function create(): View
    {
        return view('sightings.create', [
            'craftTypes' => self::CRAFT_TYPES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        return back();
    }

    public function identify(Sighting $sighting): RedirectResponse
    {
        $sighting -> identified = true;
        $sighting -> save();
        return back();
    }
}
