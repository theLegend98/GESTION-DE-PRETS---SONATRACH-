<?php

namespace App\Http\Controllers;

use App\agent;
use App\demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;


class NormalAgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $agent=Agent::find($user->id_agent);
        return view('Vue_SimpleAgent.SimpleAgentHome',compact('agent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function toProfil()
    {
        $user=Auth::user();
        $agents = DB::table('agent')

            ->join('users', 'agent.id', '=', 'users.id_Agent')
            ->join('departement', 'agent.id_departement', '=', 'departement.id')
            ->select('users.id_agent','users.name','users.email','agent.id','agent.nom','agent.prenom','agent.ddn','agent.tel','agent.id_departement','agent.statut','agent.grade','agent.salaire','departement.nom as nomdep')
            ->where('agent.id',$user->id_agent)
            ->get();
       // $agent=Agent::find($user->id_agent);
        $agent= $agents[0];
        return view('Vue_SimpleAgent.ProfilAgent',compact('agent'));
    }
    public function redirectDem()
    {
        return view('Vue_SimpleAgent.DemandePret');
    }

    public function redirectCons()
    {
        $user = Auth::user();
        $demandes = DB::select('select * from demande where id_users = ?', [$user->id]);

        $user->unreadNotifications->markAsRead();
        return view('Vue_SimpleAgent.ConsultationPret',compact('demandes'));
    }

    public function redirectConsfin()
    {
        $user=Auth::user();

        $prets = DB::table('demande')

            ->join('pret', 'demande.id', '=', 'pret.id_demande')
            ->join('users', 'demande.id_users', '=', 'users.id')
            ->join('contrat', 'pret.id', '=', 'contrat.id_pret')
            ->join('agent', 'users.id_agent', '=', 'agent.id')
            ->join('departement', 'id_departement', '=', 'departement.id')
            ->select('demande.type','demande.id_users','pret.id','pret.id_demande','pret.created_at','users.id_agent','contrat.frais_mensuel','contrat.somme_totale','contrat.duré','contrat.id_pret',  'agent.nom','agent.prenom','agent.ddn','agent.tel','agent.id_departement','agent.statut','agent.salaire','departement.nom as nomdep')
             ->where('id_users',$user->id)
            ->get();

        return view('Vue_SimpleAgent.ConsultationPretFinal',compact('prets'));
    }

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

    public function toHistorique(){
        $user = Auth::user();
        $demandes = DB::select('select * from demande where id_users = ?', [$user->id]);
        return view('Vue_SimpleAgent.HistoriquePret',compact('demandes'));
    }
}
