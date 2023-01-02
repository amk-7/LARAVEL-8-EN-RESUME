<html>
<head>
    <meta charset="utf-8">
    <title>Liste</title>
</head>
<body>
    <main>
        <h1>Formulaire d'enregistrement d'un événements.</h1>
        <form method="post" action="{{ route('enregistrementEvenement') }}">
            @csrf
            <div>
                <label>Nom</label>
                <input type="text" name="nom">
            </div>
            <div>
                <label>Montant</label>
                <input type="number" name="montant">
            </div>
            <div>
                <label>Date</label>
                <input type="datetime-local" name="date">
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
                                <input type="text" name="ville">
                            </td>
                            <td>
                                <input type="text" name="quartier">
                            </td>
                            <td>
                                <input type="text" name="lieu">
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
                        <option value="{{ $organisateur->user->id_user }}">{{ $organisateur->user->nom }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="enregister">
        </form>
    </main>
</body>
</html>
