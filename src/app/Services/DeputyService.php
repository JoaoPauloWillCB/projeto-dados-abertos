<?php

namespace App\Services;

use App\Jobs\FetchDeputyExpenses;
use App\Models\Deputy;
use Illuminate\Support\Facades\Http;

class DeputyService
{
    public function fetchDeputies(): array
    {
        $response = Http::get('https://dadosabertos.camara.leg.br/api/v2/deputados');
        return $response->json()['dados'] ?? [];
    }

    public function sync(array $deputies)
    {
        foreach ($deputies as $deputy) {
            $deputyModel = Deputy::updateOrCreate(
                ['deputy_id' => $deputy['id']],
                [
                    'name' => $deputy['nome'],
                    'party_acronym' => $deputy['siglaPartido'],
                    'state_acronym' => $deputy['siglaUf'],
                    'id_legislature' => $deputy['idLegislatura'],
                    'email' => $deputy['email'],
                    'uri_deputy_info' => $deputy['uri'],
                    'uri_party_info' => $deputy['uriPartido'],
                    'url_photo_deputy' => $deputy['urlFoto']
                ]
            );

            FetchDeputyExpenses::dispatch($deputyModel);
        }
    }

    public function getDeputyData(string $uri)
    {
        $response = Http::get($uri);
        return $response->json('dados');
    }
}