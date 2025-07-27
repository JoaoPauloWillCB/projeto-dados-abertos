<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PartyService
{
    public function getPartyDetails($id)
    {
        $response = Http::get("https://dadosabertos.camara.leg.br/api/v2/partidos/{$id}");

        return $response->json('dados');
    }
}