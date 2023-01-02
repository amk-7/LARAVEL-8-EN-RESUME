<html>
<head>
    <meta charset="utf-8">
    <title>Liste</title>
</head>
<body>
<main>
    <h1>Formulaire d'enregistrement d'un événements.</h1>
    <form method="post" action="{{ route('importExcel') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="file" value="" name="fichierExcel">
        </div>
        <input type="submit" value="enregister">
    </form>
</main>
</body>
</html>
