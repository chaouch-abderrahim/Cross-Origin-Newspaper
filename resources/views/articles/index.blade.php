<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des articles</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
    <!--J'ai travaillé dès le début avec DataTable, parce que j'ai essayé de travailler challenge par challenge. 
        Je ne sais pas si j'ai le droit ou pas d'utiliser DataTable.
    -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des articles </h1>

        @if ($articlesLeMonde->isEmpty())
            <p class="text-center">Aucun article disponible.</p>
        @else
            <table id="articlesTable" class="table table-success table-striped table-bordered">
                <thead class="thead-success">
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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#articlesTable').DataTable({
                "ordering": true // Activation du tri
            });
        });
    </script>
</body>
</html>
