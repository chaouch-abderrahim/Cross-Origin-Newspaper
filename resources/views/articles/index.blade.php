<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des articles</title>
    <!-- Inclure les fichiers CSS de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
    <h1>Liste des articles de Journal Le Monde</h1>

    @if ($articlesLeMonde->isEmpty())
        <p>Aucun article disponible.</p>
    @else
        <table id="articlesTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th>Date de publication</th>
                    <th>Contenu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articlesLeMonde as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->author ?? 'Non spécifié' }}</td>
                        <td>{{ $article->category ?? 'Non spécifiée' }}</td>
                        <td>{{ \Carbon\Carbon::parse($article->published_at)->format('d-m-Y H:i') }}</td>
                        <td>{{ $article->content }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Inclure les fichiers JavaScript de jQuery et DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#articlesTable').DataTable({
                "ordering": true // activation  de filtre 
            });
            /*
            pour filtrer par categorie 
            $('#categoryFilter').on('change', function() { var category = $(this).val(); table.column(3).search(category).draw(); })
            */
        });
    </script>
</body>
</html>

