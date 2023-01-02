<?php

namespace App\Http\Controllers;

use App\Imports\EvenementImport;
use App\Models\Evenement;
use App\Models\Organisateur;
use App\Models\User;
use App\Service\EvenementService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('evenement.index')->with(['evenements' => Evenement::all(),]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $organisateurs = Organisateur::all();
        return view('evenement.create', compact('organisateurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        EvenementService::validateFromRequest($request);

        $request->adresse = array(
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'lieu' => $request->lieu,
        );

        $request->datetime = explode("T", $request->date);
        $request->date = $request->datetime[0];
        $request->time = $request->datetime[1];

        Evenement::create([
            'nom' => $request->nom,
            'montant' => $request->montant,
            'date'=> Carbon::createFromFormat("Y-m-d H:i", $request->date." ".$request->time),
            'adresse' => $request->adresse,
            'organisateur' => User::all()->where('id_user', '=', $request->organisateur)->first()->id_user,
        ]);

        return redirect()->route('listeEvenements');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Evenement $evenement)
    {
        return view('evenement.show', compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Evenement $evenement)
    {
        $organisateurs = Organisateur::all();
        return view('evenement.edite', compact(['evenement', 'organisateurs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Evenement $evenement)
    {
        EvenementService::validateFromRequest($request);

        $request->adresse = array(
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'lieu' => $request->lieu,
        );
        $request->datetime = explode("T", $request->date);
        $request->date = $request->datetime[0];
        $request->time = $request->datetime[1];

        //dd(Carbon::createFromFormat("Y-m-d H:i", $request->date." ".$request->time));

        $evenement->nom = $request->nom;
        $evenement->montant = $request->montant;
        $evenement->adresse = $request->adresse;
        $evenement->date = Carbon::createFromFormat("Y-m-d H:i", $request->date." ".$request->time);
        $evenement->organisateur = $request->organisateur;
        $evenement->save();

        return redirect()->route('listeEvenements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Evenement $evenement)
    {
        $participants = $evenement->participants;
        foreach ($participants as $participant){
            $evenement->participants()->detach($participant->id_participant);
        }
        $evenement->delete();
        return redirect()->route('listeEvenements');
    }

    public function importEvent()
    {
        return view('evenement.importExcel');
    }

    public function importEventStore(Request $request)
    {
        $file = $request->file('fichierExcel');
        $path = "fichier.".$file->extension();
        $file->storeAs("public/", $path);
        Excel::import(new EvenementImport(), "public/".$path);
        return redirect()->route('listeEvenements');
    }

    public function genererPDF(Evenement $evenement){

        //dd($evenement->organisateur());
        $pdf = Pdf::loadView('evenement.ticket', array(
            "evenement" => $evenement
        ));

        return $pdf->download('ticket.pdf');
    }
}
