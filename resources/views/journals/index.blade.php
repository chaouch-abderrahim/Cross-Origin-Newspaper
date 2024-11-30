<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>journal</title>
</head>
<body>
    <h1>Liste des journaux</h1>
    <ul>
        @foreach ($journals as $journal)
            <li>{{ $journal->name }}</li>
        @endforeach
    </ul>
</body>
</html>