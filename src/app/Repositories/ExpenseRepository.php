<?php

namespace App\Repositories;

use App\Models\Expense;

class ExpenseRepository
{
    public function createExpense(array $data)
    {
        return Expense::updateOrCreate(
            [
                'deputy_id' => $data['deputy_id'],
                'doc_number' => $data['doc_number'],
            ],
            $data
        );
    }

    public function getByDeputyId($deputyId, $perPage = 10)
    {
        return Expense::where('deputy_id', $deputyId)
            ->orderBy('doc_date', 'desc')
            ->paginate($perPage);
    }
}
