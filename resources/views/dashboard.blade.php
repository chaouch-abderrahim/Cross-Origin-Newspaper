
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
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Liste des articles
            </h2>
        </x-slot>
    
       
  
    <div class="container-fluid mb-2 mt-2">
       
        @if (session('success')) 
            <div class="alert alert-success"> {{ session('success') }}
            </div> 
        @endif
        @if ($articles->isEmpty())
            <p class="text-center">Aucun article disponible.</p>
        @else
            <table id="articlesTable" class="table table-info table-striped table-bordered">
                <thead class="thead-info">
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Catégorie</th>
                        <th>Date de publication</th>
                        <th>Contenu</th>
                        <th>Commentaires</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->author ?? 'Non spécifié' }}</td>
                            <td>{{ $article->category ?? 'Non spécifiée' }}</td>
                            <td>{{ \Carbon\Carbon::parse($article->published_at)->format('d-m-Y H:i') }}</td>
                            <td>{{ $article->content }}</td>
                            <td>
                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                    <div class="form-group">
                                        <label for="author">Auteur :</label>
                                        <input type="text" name="author" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Commentaire :</label>
                                        <textarea name="content" class="form-control" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
                                </form>
                            </td>
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
      </x-app-layout>
</body>
</html>

