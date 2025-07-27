<?php

namespace App\Repositories;

use App\Models\Deputy;

class DeputyRepository
{
    public function getFiltered(array $filters)
    {
        $query = Deputy::query();

        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['party'])) {
            $query->where('party_acronym', 'like', '%' . $filters['party'] . '%');
        }

        if (!empty($filters['state'])) {
            $query->where('state_acronym', 'like', '%' . $filters['state'] . '%');
        }

        if (!empty($filters['email'])) {
            $query->where('email', 'like', '%' . $filters['email'] . '%');
        }

        return $query->orderBy('name')->paginate(15);
    }
}
