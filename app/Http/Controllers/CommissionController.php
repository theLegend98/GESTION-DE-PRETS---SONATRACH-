<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\demande;
use App\User;

class CommissionController extends Controller
{

    public function index()
    {
        $user=Auth::user();
        $agent=Agent::find($user->id_agent);
        return view('Vue_Commission.CommissionHome',compact('agent'));
    }


    public function redirectCons()
    {
        $user = Auth::user();



        $agents=Agent::all();

        $usersAgent = DB::table('agent')
        ->leftJoin('users', 'agent.id', '=', 'users.id_agent')
        ->get();


        $demandes=Demande::where('id_users', 1000);
        foreach ($agents as $agent2){

            $user2=User::where('id_agent',$agent2->id)->first();
            if($user2!==null){
                $demande = Demande::where('id_users', $user2->id)->where('valid_cl',1)->where('valid_fin',0)->where('statut', "En attente")->get();
                  $demandes = $demande->merge($demandes);
            }
        }


        return view('Vue_Commission.ConsultationpretCOM',compact('demandes','usersAgent'));
    }

    public function redirectQuota(){
        return view('Vue_Commission.DeclarerQuota');
    }

    public function defineQuota(Request $request)
    {
        $request->validate([
            'quotaSocial'=>'required',
            'quotaVehicule'=>'required',
            'quotaConstruction'=>'required',
            'quotaAchatlogement'=>'required'
        ]);

        DB::update('update type_prets set quota = ? where id = 1', [$request->get('quotaSocial')]);
        DB::update('update type_prets set quota = ? where id = 2', [$request->get('quotaConstruction')]);
        DB::update('update type_prets set quota = ? where id = 3', [$request->get('quotaVehicule')]);
        DB::update('update type_prets set quota = ? where id = 4', [$request->get('quotaAchatlogement')]);

        return redirect()->back();
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
        return view('Vue_Commission.ProfilCommission',compact('agent'));
    }
}
