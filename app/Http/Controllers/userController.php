<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\agent;
use Illuminate\Support\Facades\DB;
class userController extends Controller
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
            'type'=>'required',
            'id_agent'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',

        ]);
        if($request->get('type')=="ADMINISTRATEUR")
        {
            if(DB::table('users')->where('type','=','ADMINISTRATEUR')->count() > 0)
            {
                return redirect()->back()->with('message', 'Impossible de créer 2 administrateur');
            }
            else{
                User::create([ 'type'=>$request->get('type'),
                'id_agent'=>$request->get('id_agent'),
                'name'=>$request->get('name'),
                'email'=>$request->get('email'),
                'password'=>Hash::make($request->get('password')),
                ]);


                    return redirect()->back()->with('message', 'Utilisateur Crée');
            }
        }
        elseif($request->get('type')=="CHEFUNITE"){
            $agent=Agent::find($request->get('id_agent'));

            $userDEp=DB::table('users')
            ->join("Agent","users.id_agent","agent.id")->select('agent.id','agent.id_departement','users.id_agent','users.type')
            ->where('type','=','CHEFUNITE')->where("id_departement","=",$agent->id_departement)->count();

            if($userDEp> 0)
            {
                return redirect()->back()->with('message', 'Impossible de créer 2 chef d\'unité dans le même département');
            }
            else{
                User::create([ 'type'=>$request->get('type'),
                'id_agent'=>$request->get('id_agent'),
                'name'=>$request->get('name'),
                'email'=>$request->get('email'),
                'password'=>Hash::make($request->get('password')),
                ]);


                    return redirect()->back()->with('message', 'Utilisateur Crée');
            }

        } else{

        User::create([ 'type'=>$request->get('type'),
        'id_agent'=>$request->get('id_agent'),
        'name'=>$request->get('name'),
        'email'=>$request->get('email'),
        'password'=>Hash::make($request->get('password')),
        ]);


            return redirect()->back()->with('message', 'Utilisateur Crée');
        }

    }

    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
    public function edit($id)
    {
        $agents=Agent::all();
        $user =User::find($id);
        return view('Vue_SYSADM.EDITUSERS', compact('user','agents'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type'=>'required',
            'id_agent'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',

        ]);

        $user = User::find($id);
        $user->type =  $request->get('type');
        $user->id_agent = $request->get('id_agent');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));

        $user->save();

        return redirect()->back()->with('message', 'Utilisateur Modifié');
    }

}
