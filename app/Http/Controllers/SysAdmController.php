<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\departement;
use App\agent;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
class SysAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $agent=Agent::find($user->id_agent);
        return view('Vue_SYSADM.SYSADMHOME',compact('agent'));
    }

    public function ajouterA()
    {
        $departements=departement::all();
        return view('Vue_SYSADM.ADDAGENTS',compact('departements'));
    }

    public function ajouterU()
    {
        $agents=agent::all();
        return view('Vue_SYSADM.ADDUSERS',compact('agents'));
    }

    public function consulterA()
    {
        $agents=Agent::all();
        return view('Vue_SYSADM.SHOWAGENTS',compact('agents'));
    }

    public function consulterU()
    {
        $Users = DB::table('users')->join('agent', 'users.id_agent', '=', 'agent.id')->select('users.*','agent.nom','agent.prenom','agent.ddn','agent.tel','agent.id_departement','agent.statut')->get();


        return view('Vue_SYSADM.SHOWUSERS',compact('Users'));
    }

    public function modifierA()
    {

    }

    public function modifierU()
    {

    }

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
        return view('Vue_SYSADM.ProfilSysAdm',compact('agent'));
    }
}
