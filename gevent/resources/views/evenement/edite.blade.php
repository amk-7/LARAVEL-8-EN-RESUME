<html>
<head>
    <meta charset="utf-8">
    <title>Liste</title>
</head>
<body>
<main>
    <h1>Edition de l' événements {{ $evenement->id_evenement }}.</h1>
    <form method="post" action="{{ route('miseAjourEvenement', $evenement) }}">
        @csrf
        @method('put')
        <div>
            <label>Nom</label>
            <input type="text" name="nom" value="{{ $evenement->nom }}">
        </div>
        <div>
            <label>Montant</label>
            <input type="number" name="montant" value="{{ $evenement->montant }}">
        </div>
        <div>
            <label>Date</label>
            <input type="datetime-local" name="date" value="{{ $evenement->date }}">
        </div>
        <div>
            <label>Adresse</label>
            <table>
                <thead>
                <th>Ville</th>
                <th>Quartier</th>
                <th>lieu</th>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <input type="text" name="ville" value="{{ $evenement->adresse["ville"] }}">
                    </td>
                    <td>
                        <input type="text" name="quartier" value="{{ $evenement->adresse["quartier"] }}">
                    </td>
                    <td>
                        <input type="text" name="lieu" value="{{ $evenement->adresse["lieu"] }}">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div>
            <label>Organisateur</label>
            <select name="organisateur">
                <option value="">Sélectionner</option>
                @foreach($organisateurs as $organisateur)
                    <option value="{{ $organisateur->user->id_user }}" {{ $evenement->organisateur == $organisateur->user->id_user ? "selected" : "" }}>{{ $organisateur->user->nom }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Mettre à jour">
    </form>
</main>
</body>
</html>
