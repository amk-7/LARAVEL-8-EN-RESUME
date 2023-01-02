<html>
    <head>
        <meta charset="utf-8">
        <title>Liste</title>
    </head>
    <body>
        <div>
            <form method="get" action="{{route('formulaireEnregistrementEvenement')}}">
                <input type="submit" name="ajouter" value="Ajouter">
            </form>
            <form method="get" action="{{route('formulaireImportExcel')}}">
                <input type="submit" name="ajouter" value="Importer">
            </form>
        </div>
        @if($evenements && $evenements->count() > 0)
            <h1>{{ __("Liste des événements") }}</h1>
            <table border="1">
                <thead>
                <th>Nom</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Adresse</th>
                <th>Organisation</th>
                <th>Nombre de participant</th>
                <th>Participer</th>
                <th>Editer</th>
                <th>Supprimer</th>
                </thead>
                <tbody>
                @foreach($evenements as $event)
                    <tr>
                        <td>{{ $event->nom }}</td>
                        <td>{{ $event->montant }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ \App\Helpers\EvenementHelper::afficherAdresse($event->adresse) }}</td>
                        <td>{{ \App\Helpers\EvenementHelper::afficherOrganisateur($event->organisateur) }}</td>
                        <td>{{ $event->getNombreParticipant() }}</td>
                        <td>
                            <form method="post" action="{{ route('generatePdf', $event) }}">
                                @csrf
                                <input type="submit" value="Participer">
                            </form>
                        </td>
                        <td>
                            <form method="get" action="{{route('formulaireEditerEvenement', $event)}}">
                                @csrf
                                <input type="submit" value="Editer">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{route('supprimerEvenement', $event)}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Supprimer">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h1>Aucun événement enregister.</h1>
        @endif

    </body>
</html>
