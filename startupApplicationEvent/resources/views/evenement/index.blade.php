<html>
    <head>
        <meta charset="utf-8">
        <title>Liste</title>
    </head>
    <body>
        @if($events->count() > 0)
            <table border="1">
                <thead>
                <th>Désignation</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Consulter</th>
                <th>Editer</th>
                <th>Supprimer</th>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->designation }}</td>
                        <td>{{ $event->montant }}</td>
                        <td>{{ $event->date }}</td>
                        <td>
                            <form method="" action="">
                                <input type="submit" value="Consulter">
                            </form>
                        </td>
                        <td>
                            <form method="" action="">
                                <input type="submit" value="Editer">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{route('supprimer_evenement', $event)}}">
                                @csrf
                                <input type="submit" value="Supprimer">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </body>
<!--
Route::get('liste_des_evenements', [\App\Http\Controllers\EvenementController::class, 'index'])->name('liste_evenements');
Route::get('formulaire_enregistrement_evenement', [\App\Http\Controllers\EvenementController::class, 'create'])->name('formulaire_enregistrement_evenement');
Route::post('supprimer_evenement/{evenement}', [\App\Http\Controllers\EvenementController::class, 'destroy'])->name('supprimer_evenement');
-->
</html>
