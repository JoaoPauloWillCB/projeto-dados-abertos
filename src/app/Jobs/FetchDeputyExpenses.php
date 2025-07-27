<?php

namespace App\Jobs;

use App\Models\Deputy;
use App\Models\Expense;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;

class FetchDeputyExpenses implements ShouldQueue
{
    use Queueable;

    protected $deputy;

    /**
     * Create a new job instance.
     */
    public function __construct(Deputy $deputy)
    {
        $this->deputy = $deputy;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $url = "https://dadosabertos.camara.leg.br/api/v2/deputados/{$this->deputy->deputy_id}/despesas";
        $response = Http::get($url);

        if ($response->successful()) {

            $expenses = $response->json()['dados'];

            foreach ($expenses as $expense) {

                Expense::create([
                    'deputy_id' => $this->deputy->deputy_id,
                    'supplier_cpfcnpj' => $expense['cnpjCpfFornecedor'],
                    'refund_number' => $expense['numRessarcimento'],
                    'expense_type' => $expense['tipoDespesa'],
                    'doc_type' => $expense['tipoDocumento'],
                    'doc_date' => $expense['dataDocumento'],
                    'doc_number' => $expense['numDocumento'],
                    'url_doc' => $expense['urlDocumento'],
                    'supplier_name' => $expense['nomeFornecedor'],
                    'doc_code' => $expense['codDocumento'],
                    'code_doc_type' => $expense['codTipoDocumento'],
                    'year' => $expense['ano'],
                    'month' => $expense['mes'],
                    'cod_batch' => $expense['codLote'],
                    'parcel' => $expense['parcela'],
                    'doc_value' => $expense['valorDocumento'],
                    'net_value' => $expense['valorLiquido'],
                    'gloss_value' => $expense['valorGlosa']
                ]);
            }
        }
    }
}
