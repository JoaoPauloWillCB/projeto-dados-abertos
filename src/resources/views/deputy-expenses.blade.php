<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Despesas do Deputado #{{ $deputyId }}</title>
    <link rel="stylesheet" href="{{ asset('css/deputy-expenses.css') }}">
</head>
<body>

<h1>Despesas do Deputado #{{ $deputyId }}</h1>
<a href="{{ route('deputados.show', $deputyId) }}" class="back-link">Voltar para o deputado</a>

<!-- Pagination -->
<div class="pagination-container">
    {{ $expenses->links() }}
</div>

<!-- Expenses table -->
@if($expenses->isEmpty())
    <p>Nenhuma despesa registrada para este deputado.</p>
@else
    <div class="table-container">
        <table class="deputies-table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Fornecedor</th>
                    <th>Tipo de Despesa</th>
                    <th>Valor Documento</th>
                    <th>Valor Líquido</th>
                    <th>Documento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($expense->doc_date)->format('d/m/Y') }}</td>
                        <td>{{ $expense->supplier_name }}</td>
                        <td>{{ $expense->expense_type }}</td>
                        <td>R$ {{ number_format($expense->doc_value, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($expense->net_value, 2, ',', '.') }}</td>
                        <td>
                            @if($expense->url_doc)
                                <a href="{{ $expense->url_doc }}" target="_blank" rel="noopener">Ver documento</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        {{ $expenses->links() }}
    </div>
@endif
</body>
</html>
