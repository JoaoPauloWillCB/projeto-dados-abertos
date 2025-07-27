<?php

namespace App\Http\Controllers;

use App\Services\DeputyExpenseService;

class DeputyExpenseController extends Controller
{
    protected $expenseService;

    public function __construct(DeputyExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    public function index($deputyId)
    {
        $expenses = $this->expenseService->listDeputyExpenses($deputyId);

        return view('deputy-expenses', [
            'expenses' => $expenses, 
            'deputyId' => $deputyId
        ]);
    }
}
