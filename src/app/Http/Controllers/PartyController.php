<?php

namespace App\Http\Controllers;

use App\Services\PartyService;
use Illuminate\Support\Facades\Http;

class PartyController extends Controller
{
    protected $partyService;

    public function __construct(PartyService $partyService)
    {
        $this->partyService = $partyService;
    }

    public function show($id)
    {
        $partyData = $this->partyService->getPartyDetails($id);

        return view('party-details', [
            'partyData' => $partyData,
            'status' => $partyData['status'],
            'leader' => $partyData['status']['lider']
        ]);
    }
}
