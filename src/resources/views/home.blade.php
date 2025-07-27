<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deputados</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

<h1>Lista de Deputados</h1>

<!-- Filters -->
<div class="filter-container">
    <form method="GET" action="{{ route('deputados.index') }}" class="filter-form">
        <div class="filter-field">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" value="{{ request('name') }}" placeholder="Nome do deputado">
        </div>
        <div class="filter-field">
            <label for="party">Partido</label>
            <input type="text" name="party" id="party" value="{{ request('party') }}" placeholder="Sigla do partido">
        </div>
        <div class="filter-field">
            <label for="state">Estado</label>
            <input type="text" name="state" id="state" value="{{ request('state') }}" placeholder="Sigla do estado">
        </div>
        <div class="filter-field">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ request('email') }}" placeholder="Email">
        </div>
        <div class="filter-actions">
            <button type="submit" class="apply-btn">Aplicar Filtros</button>
            <a href="{{ route('deputados.index') }}" class="reset-btn">Limpar</a>
        </div>
    </form>
</div>

<!-- Pagination -->
<div class="pagination-container">
    {{ $deputies->links() }}
</div>

<!-- Deputies table -->
<div class="table-container">
    <table class="deputies-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Partido</th>
                <th>Estado</th>
                <th>Email</th>
                <th>Links</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($deputies as $deputy)
            <tr>
                <td data-label="Foto">
                    <img src="{{ $deputy->url_photo_deputy }}" alt="Foto" class="photo">
                </td>
                <td data-label="Nome">
                    <a href="{{ route('deputados.show', $deputy->deputy_id) }}">{{ $deputy->name }}</a>
                </td>
                <td data-label="Partido">{{ $deputy->party_acronym }}</td>
                <td data-label="Estado">{{ $deputy->state_acronym }}</td>
                <td data-label="Email">{{ $deputy->email }}</td>
                <td data-label="Links" class="links">
                    <a href="{{ route('deputados.show', $deputy->deputy_id) }}">Deputado</a>
                    @php
                        $partyId = basename($deputy->uri_party_info);
                    @endphp
                    <a href="{{ route('partidos.show', $partyId) }}">Partido</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="pagination-container">
    {{ $deputies->links() }}
</div>

</body>
</html>

<script>
    const toggleBtn = document.getElementById('toggleFilter');
    const filterForm = document.getElementById('filterForm');
    const applyBtn = document.getElementById('applyFilter');

    const rows = document.querySelectorAll('.deputies-table tbody tr');

    toggleBtn.addEventListener('click', () => {
        filterForm.style.display = (filterForm.style.display === 'block') ? 'none' : 'block';
    });
</script>