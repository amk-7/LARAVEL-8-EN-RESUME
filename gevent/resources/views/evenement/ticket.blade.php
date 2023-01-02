<html>
<head>
    <meta charset="utf-8">
    <title>Liste</title>
</head>
<body>
    <main>
        <h1>Ticket de l'evenement : {{ $evenement->nom }}</h1>
        <fieldset>
            <div>
                <label>Nom : </label><label>{{ $evenement->nom }}</label>
            </div>
            <div>
                <label>Montant : </label><label>{{ $evenement->montant }}</label>
            </div>
            <div>
                <label>Date : </label><label>{{ \App\Helpers\EvenementHelper::afficherDateEtDate($evenement->date) }}</label>
            </div>
            <div>
                <label>Adresse : </label><label>{{ \App\Helpers\EvenementHelper::afficherAdresse($evenement->adresse) }}</label>
            </div>
            <div>
                <label>Organisateur : </label><label>{{-- $evenement->organisateur->nom." ".$evenement->organisateur->prenom --}}</label>
            </div>
        </fieldset>
    </main>
</body>
</html>
