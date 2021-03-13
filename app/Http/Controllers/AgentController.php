<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\agent;
use App\departement;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();


        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'ddn'=>'required',
            'tel'=>'required|max:10|regex:/[0]{1}[1-9]{1}[0-9]{8}/',
            'id_departement'=>'required',
            'statut'=>'required',

        ]);
        $request->request->add(['salaire' => 80000]);
        if(DB::table('agent')->where("nom","=",$request->get('nom'))->where("prenom","=",$request->get('prenom'))->where("ddn","=",$request->get('ddn'))->count() > 0){
            return redirect()->back()->with('message', 'L\'Agent existe déja');
        } else{
          Agent::create($request->all());

            return redirect()->back()->with('message', 'Agent Crée');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editTel(Request $request,$id)
    {
        $request->validate([
            'tel'=>'required|max:10|regex:/[0]{1}[1-9]{1}[0-9]{8}/',
        ]);
        $agent=agent::find($id);
        $agent->tel=$request->get('tel');

        $agent->save();

        return redirect()->back();

    }

    public function destroy($id)
    {
        $agent = Agent::find($id);
        $agent->delete();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'ddn'=>'required',
            'tel'=>'required|max:10|regex:/[0]{1}[1-9]{1}[0-9]{8}/',
            'id_departement'=>'required',
            'statut'=>'required',

        ]);

        $agent = Agent::find($id);
        $agent->nom =  $request->get('nom');
        $agent->prenom = $request->get('prenom');
        $agent->ddn = $request->get('ddn');
        $agent->tel = $request->get('tel');
        $agent->id_departement = $request->get('id_departement');
        $agent->statut = $request->get('statut');
        $agent->save();

        return redirect('ConsulterAgents');
    }

    public function edit($id)
    {
        $departements=Departement::all();
        $agent =Agent::find($id);
        return view('Vue_SYSADM.EDITAGENTS', compact('agent','departements'));
    }
}
