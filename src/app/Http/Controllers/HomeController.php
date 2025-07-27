<?php

namespace App\Http\Controllers;

use App\Models\Deputy;
use App\Services\DeputyService;

class HomeController extends Controller
{
    public function index(DeputyService $deputyService)
    {
        if (Deputy::count() === 0) {
            $deputies = $deputyService->fetchDeputies();
            $deputyService->sync($deputies);
        }

        $deputies = Deputy::paginate(15);

        return view('home', compact('deputies'));
    }
}
