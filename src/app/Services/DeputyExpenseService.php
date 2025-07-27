<?php

namespace App\Services;

use App\Repositories\ExpenseRepository;

class DeputyExpenseService
{
    protected $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }

    public function listDeputyExpenses($deputyId)
    {
        return $this->expenseRepository->getByDeputyId($deputyId);
    }
}
