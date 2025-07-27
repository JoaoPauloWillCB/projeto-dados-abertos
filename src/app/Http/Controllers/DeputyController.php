<?php

namespace App\Http\Controllers;

use App\Repositories\DeputyRepository;
use App\Services\DeputyService;
use Illuminate\Http\Request;

class DeputyController extends Controller
{
    private $repository;
    private $service;

    public function __construct(DeputyRepository $repository, DeputyService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['name', 'party', 'state', 'email']);
        $deputies = $this->repository->getFiltered($filters);
        $deputies->appends($filters);

        return view('home', compact('deputies'));
    }

    public function show($id)
    {
        $deputy = \App\Models\Deputy::where('deputy_id', $id)->firstOrFail();

        $deputyData = $this->service->getDeputyData($deputy->uri_deputy_info);

        return view('deputy-details', [
            'deputyData' => $deputyData,
            'lastStatus' => $deputyData['ultimoStatus'],
            'cabinet' => $deputyData['ultimoStatus']['gabinete']
        ]);
    }
}
