<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// routes evenements
Route::get('liste_des_evenements', [\App\Http\Controllers\EvenementController::class, 'index'])->name('listeEvenements');
Route::get('formulaire_enregistrement_evenement', [\App\Http\Controllers\EvenementController::class, 'create'])->name('formulaireEnregistrementEvenement');
Route::post('enregistrement_evenement', [\App\Http\Controllers\EvenementController::class, 'store'])->name('enregistrementEvenement');
Route::get('afficher_evenement/{evenement}', [\App\Http\Controllers\EvenementController::class, 'destroy'])->name('afficherEvenement');
Route::get('formulaire_editer_evenement/{evenement}/editer', [\App\Http\Controllers\EvenementController::class, 'edit'])->name('formulaireEditerEvenement');
Route::put('mise_a_jour_evenement/{evenement}', [\App\Http\Controllers\EvenementController::class, 'update'])->name('miseAjourEvenement');
Route::delete('supprimer_evenement/{evenement}', [\App\Http\Controllers\EvenementController::class, 'destroy'])->name('supprimerEvenement');
Route::put('mise_a_jour_evenement/{evenement}', [\App\Http\Controllers\EvenementController::class, 'update'])->name('miseAjourEvenement');
Route::get('formulaire_import_excel', [\App\Http\Controllers\EvenementController::class, 'importEvent'])->name('formulaireImportExcel');
Route::post('import_excel', [\App\Http\Controllers\EvenementController::class, 'importEventStore'])->name('importExcel');

Route::post('genarate_pdf/{evenement}', [\App\Http\Controllers\EvenementController::class, 'genererPDF'])->name('generatePdf');


// routes participants
Route::get('liste_des_participants', [\App\Http\Controllers\EvenementController::class, 'index'])->name('listeparticipants');
Route::get('formulaire_enregistrement_participant', [\App\Http\Controllers\EvenementController::class, 'create'])->name('formulaireEnregistrementparticipant');
Route::post('enregistrement_participant', [\App\Http\Controllers\EvenementController::class, 'store'])->name('enregistrementparticipant');
Route::get('afficher_participant/{participant}', [\App\Http\Controllers\EvenementController::class, 'destroy'])->name('afficherparticipant');
Route::get('editer_participant/{participant}/editer', [\App\Http\Controllers\EvenementController::class, 'edit'])->name('editerparticipant');
Route::put('mise_a_jour_participant/{participant}', [\App\Http\Controllers\EvenementController::class, 'update'])->name('miseAjourparticipant');
Route::delete('supprimer_participant/{participant}', [\App\Http\Controllers\EvenementController::class, 'destroy'])->name('supprimerparticipant');

require __DIR__.'/auth.php';

