<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Etudiant;
use App\Releve;
use App\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DepotRelevesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:utilisateur');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateur = Auth::user();

        $Rel_depots = DB::select('
            SELECT r.id, e.name, e.first_name, r.annee_du_releve, r.type_releve
            FROM releves r, demandes d, etudiants e, etapes et
            WHERE d.demandeable_id = r.id
            AND r.etape_id = et.id
            AND d.etudiant_id = e.id
            AND et.libelle = "Dépôt"
            AND et.type = "releve"
            AND e.etablissement_id = '.$utilisateur->etablissement->id
        );
        $nRel_depots = COUNT($Rel_depots);

        return view('utilisateurs.admin-depot-rel', compact([
            'Rel_depots',
            'nRel_depots',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}