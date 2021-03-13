<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\agent;
use App\contrat;
use Illuminate\Support\Facades\DB;
use App\demande;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use App\pret;
use Illuminate\Support\Facades\Notification;

class AdministrateurController extends Controller
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
        return view('Vue_Adminstrateur.AdminstrateurHome',compact('agent'));
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



    public function redirectCons()
    {
        $user = Auth::user();



        $agents=Agent::all();

        $usersAgent = DB::table('agent')
        ->leftJoin('users', 'agent.id', '=', 'users.id_agent')
        ->get();

     //   $usersAgents= $usersAgent->where('id_departement',$agent->id_departement)->get();

        $demandes=Demande::where('id_users', 1000);
        foreach ($agents as $agent2){

            $user2=User::where('id_agent',$agent2->id)->first();
            if($user2!==null){


                $demande = Demande::where('id_users', $user2->id)->where('valid_cu',1)->where('statut', "En attente")->get();


                        $demandes = $demande->merge($demandes);



            }
        }


        return view('Vue_Adminstrateur.ConsultationPretADM',compact('demandes','usersAgent'));
    }


    public function redirectConsfin()
    {
        $prets = DB::table('demande')

            ->join('pret', 'demande.id', '=', 'pret.id_demande')
            ->join('users', 'demande.id_users', '=', 'users.id')
            ->join('contrat', 'pret.id', '=', 'contrat.id_pret')
            ->join('agent', 'users.id_agent', '=', 'agent.id')
            ->join('departement', 'id_departement', '=', 'departement.id')
            ->select('demande.type','demande.id_users','pret.id','pret.id_demande','pret.created_at','users.id_agent','contrat.frais_mensuel','contrat.somme_totale','contrat.duré','contrat.id_pret',  'agent.nom','agent.prenom','agent.ddn','agent.tel','agent.id_departement','agent.statut','agent.salaire','departement.nom as nomdep')
            ->get();

        return view('Vue_Adminstrateur.ConsultationPretfinADM',compact('prets'));
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

    public function export_pdf()
    {
        $nbSoc=DB::table('type_prets')->select('quota')->Where('id', 1)->get();
        $nbCon=DB::table('type_prets')->select('quota')->Where('id', 2)->get();
        $nbVec=DB::table('type_prets')->select('quota')->Where('id', 3)->get();
        $nbAch=DB::table('type_prets')->select('quota')->Where('id', 4)->get();

        $DemSoc= DB::table('demande')
                ->where('type','SOCIAL')
                ->where('valid_fin',false)
                ->where('valid_cl',true)
                ->where('statut','En attente')
                ->orderBy('created_at', 'asc')
                ->limit($nbSoc[0]->quota);


        $DemCon= DB::table('demande')
                ->where('type','CONSTRUCTION')
                ->where('valid_fin',false)
                ->where('valid_cl',true)
                ->where('statut','En attente')
                ->orderBy('created_at', 'asc')
                ->limit($nbCon[0]->quota);


        $DemVec= DB::table('demande')
                ->where('type','VEHICULE')
                ->where('valid_fin',false)
                ->where('valid_cl',true)
                ->where('statut','En attente')
                ->orderBy('created_at', 'asc')
                ->limit($nbVec[0]->quota);


        $DemAch= DB::table('demande')
                ->where('type','ACHAT LOGEMENT')
                ->where('valid_fin',false)
                ->where('valid_cl',true)
                ->where('statut','En attente')
                ->orderBy('created_at', 'asc')
                ->limit($nbAch[0]->quota);

        $data=$DemCon->union($DemSoc)->union($DemVec)->union($DemAch)->orderBy('created_at', 'asc')->get();

        foreach($data as $dem)
        {
            $pret=pret::create(['id_demande'=>$dem->id]);
            if($dem->type=="SOCIAL"){
                $sommetotale=300000;
            }
            else if($dem->type=="CONSTRUCTION"){
                $sommetotale=700000;
            }
            else if($dem->type=="VEHICULE"){
                $sommetotale=700000;
            }
            else if($dem->type=="ACHAT LOGEMENT"){
                $sommetotale=800000;
            }

            contrat::create(['id_pret'=>$pret->id ,
                              'frais_mensuel'=> 15000,
                              'Duré'=>0,
                              'id_user'=>1,
                              'date'=>'2020-09-02 20:45:31',
                              'somme_totale'=> $sommetotale, ]);
         }

        $DemSoc ->update(['valid_fin' => true],['statut' => "Accepté"]);
        $DemVec ->update(['valid_fin' => true],['statut' => "Accepté"]);
        $DemCon ->update(['valid_fin' => true],['statut' => "Accepté"]);
        $DemAch ->update(['valid_fin' => true],['statut' => "Accepté"]);




        DB::update('update type_prets set quota = ? where id = 1', [null]);
        DB::update('update type_prets set quota = ? where id = 2', [null]);
        DB::update('update type_prets set quota = ? where id = 3', [null]);
        DB::update('update type_prets set quota = ? where id = 4', [null]);
        $age=Agent::all();
        $use=User::all();

        $pdf = PDF::loadView('PDF.ShowListDemande',compact('data','use','age'));
        $pdf->save(storage_path().'_filename.pdf');

        return $pdf->download('demande.pdf');

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
        return view('Vue_Adminstrateur.ProfilAdministreur',compact('agent'));
    }
}

