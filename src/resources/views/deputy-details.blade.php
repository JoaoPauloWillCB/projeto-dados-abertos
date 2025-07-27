<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Detalhes do Deputado - {{ $lastStatus['nomeEleitoral'] ?? $deputyData['nomeCivil'] }}</title>
    <link rel="stylesheet" href="{{ asset('css/deputy-details.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<h1>Detalhes do Deputado</h1>

<!-- Personal data -->
<div class="section">
    <h2>Dados Pessoais</h2>
    <img src="{{ $deputyData['ultimoStatus']['urlFoto'] ?? '' }}" alt="Foto do Deputado" class="photo" />
    <a href="{{ route('deputados.index') }}" class="back-link">← Voltar para a lista</a>
    <a href="{{ route('deputados.despesas.index', ['id' => $deputyData['id']]) }}" class="back-link">Visualizar despesas</a>

    <table>
        <tr><th>ID</th><td>{{ $deputyData['id'] ?? '-' }}</td></tr>
        <tr><th>Nome Civil</th><td>{{ $deputyData['nomeCivil'] ?? '-' }}</td></tr>
        <tr><th>Nome Eleitoral</th><td>{{ $lastStatus['nomeEleitoral'] ?? '-' }}</td></tr>
        <tr><th>CPF</th><td>{{ $deputyData['cpf'] ?? '-' }}</td></tr>
        <tr><th>Sexo</th><td>{{ $deputyData['sexo'] ?? '-' }}</td></tr>
        <tr><th>Data de Nascimento</th><td>{{ $deputyData['dataNascimento'] ?? '-' }}</td></tr>
        <tr><th>Data de Falecimento</th><td>{{ $deputyData['dataFalecimento'] ?? '-' }}</td></tr>
        <tr><th>UF Nascimento</th><td>{{ $deputyData['ufNascimento'] ?? '-' }}</td></tr>
        <tr><th>Município Nascimento</th><td>{{ $deputyData['municipioNascimento'] ?? '-' }}</td></tr>
        <tr><th>Escolaridade</th><td>{{ $deputyData['escolaridade'] ?? '-' }}</td></tr>
    </table>
</div>

<!-- Last status -->
<div class="section">
    <h2>Último Status</h2>
    <table>
        <tr><th>Nome</th><td>{{ $lastStatus['nome'] ?? '-' }}</td></tr>
        <tr><th>Partido</th><td>{{ $lastStatus['siglaPartido'] ?? '-' }}</td></tr>
        <tr><th>Estado</th><td>{{ $lastStatus['siglaUf'] ?? '-' }}</td></tr>
        <tr><th>ID Legislatura</th><td>{{ $lastStatus['idLegislatura'] ?? '-' }}</td></tr>
        <tr><th>Email</th><td>{{ $lastStatus['email'] ?? '-' }}</td></tr>
        <tr><th>Data</th><td>{{ $lastStatus['data'] ?? '-' }}</td></tr>
        <tr><th>Situação</th><td>{{ $lastStatus['situacao'] ?? '-' }}</td></tr>
        <tr><th>Condição Eleitoral</th><td>{{ $lastStatus['condicaoEleitoral'] ?? '-' }}</td></tr>
    </table>
</div>

<!-- Cabninet info -->
<div class="section">
    <h2>Gabinete</h2>
    <table>
        <tr><th>Nome</th><td>{{ $cabinet['nome'] ?? '-' }}</td></tr>
        <tr><th>Prédio</th><td>{{ $cabinet['predio'] ?? '-' }}</td></tr>
        <tr><th>Sala</th><td>{{ $cabinet['sala'] ?? '-' }}</td></tr>
        <tr><th>Andar</th><td>{{ $cabinet['andar'] ?? '-' }}</td></tr>
        <tr><th>Telefone</th><td>{{ $cabinet['telefone'] ?? '-' }}</td></tr>
    </table>
</div>

<!-- Social medias -->
<div class="section">
    <h2>Redes Sociais</h2>
    @if(!empty($deputyData['redeSocial']) && is_array($deputyData['redeSocial'] ?? null))
        <ul class="social-links">
            @foreach($deputyData['redeSocial'] as $social)
                @php
                    $iconClass = 'fa-globe';
                    if (str_contains($social, 'facebook')) $iconClass = 'fa-facebook';
                    elseif (str_contains($social, 'twitter')) $iconClass = 'fa-twitter';
                    elseif (str_contains($social, 'instagram')) $iconClass = 'fa-instagram';
                    elseif (str_contains($social, 'youtube')) $iconClass = 'fa-youtube';
                @endphp
                <li>
                    <a href="{{ $social }}" target="_blank"><i class="fab {{ $iconClass }}"></i></a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Sem redes sociais registradas.</p>
    @endif
</div>
</body>
</html>