<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Partido - {{ $partyData['sigla'] ?? '' }}</title>
    <link rel="stylesheet" href="{{ asset('css/party-details.css') }}">
</head>
<body>

<h1>Detalhes do Partido</h1>

<!-- Leader data -->
<div class="section">
    <h2>Lider</h2>
    <img src="{{ $leader['urlFoto'] ?? '' }}" alt="Foto do Lider" class="photo" />
    <table>
        <tr><th>Nome</th><td>{{ $leader['nome'] ?? '-' }}</td></tr>
        <tr><th>Sigla Partido</th><td>{{ $leader['siglaPartido'] ?? '-' }}</td></tr>
        <tr><th>UF</th><td>{{ $leader['uf'] ?? '-' }}</td></tr>
        <tr><th>ID Legislatura</th><td>{{ $leader['idLegislatura'] ?? '-' }}</td></tr>
    </table>
</div>

<!-- Party info -->
<div class="section">
    <h2>Partido</h2>
    <table>
        <tr><th>ID</th><td>{{ $partyData['id'] ?? '-' }}</td></tr>
        <tr><th>Sigla</th><td>{{ $partyData['sigla'] ?? '-' }}</td></tr>
        <tr><th>Nome</th><td>{{ $partyData['nome'] ?? '-' }}</td></tr>
        <tr><th>Situação</th><td>{{ $status['situacao'] ?? '-' }}</td></tr>
        <tr><th>Total Posse</th><td>{{ $status['totalPosse'] ?? '-' }}</td></tr>
        <tr><th>Total Membros</th><td>{{ $status['totalMembros'] ?? '-' }}</td></tr>
        <tr><th>Número Eleitoral</th><td>{{ $partyData['numeroEleitoral'] ?? '-' }}</td></tr>
    </table>
</div>

<!-- Official links -->
<div class="section">
    <h2>Links Oficiais</h2>
    <ul class="social-links">
        @if(!empty($partyData['urlWebSite']))
            <li>
                <a href="{{ $partyData['urlWebSite'] }}" target="_blank" title="Site Oficial">
                    <i class="fas fa-globe"></i>
                </a>
            </li>
        @endif

        @if(!empty($partyData['urlFacebook']))
            <li>
                <a href="{{ $partyData['urlFacebook'] }}" target="_blank" title="Facebook">
                    <i class="fab fa-facebook"></i>
                </a>
            </li>
        @endif

        @if(empty($partyData['urlWebSite']) && empty($partyData['urlFacebook']))
            <li><span>- Nenhum link disponível</span></li>
        @endif
    </ul>
</div>

<a href="{{ route('deputados.index') }}" class="back-link">← Voltar para a lista</a>

</body>
</html>