<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>
<body>
  
    <h1>Liste des articles de Journal Le Monde </h1>
    <ul>
        @foreach ($articlesLeMonde as $article)
        <li>
            <strong>{{ $article->title }}</strong><br>
            Auteur : {{ $article->author }}<br>
            Catégorie : {{ $article->category }}<br>
            Date de publication : {{ \Carbon\Carbon::parse($article->published_at)->format('d-m-Y H:i') }}<br>
            Contenu : {{ $article->content }}
        </li>
        @endforeach
    </ul>
</body>
</html>