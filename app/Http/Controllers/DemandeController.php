<?php

namespace App\Http\Controllers;

use App\demande;
use App\Notifications\RepliedToThread;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Events\DemandeValidCU;
use Illuminate\Support\Facades\Storage;
use PDF;


use App\Notifications\MyFirstNotification;
use Symfony\Component\Console\Input\Input;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $user = Auth::user();




        $request->validate([
            'type'=>'required',
            'document'=>'required'

        ]);



        $request->request->add(['id_users' => $user->id]);
        $request->request->add(['statut' => 'En attente']);
        $request->request->add(['valid_cu' => false]);
        $request->request->add(['valid_cl' => false]);
        $request->request->add(['valid_fin' => false]);


        $nbdemande = DB::table('demande')->where('id_users', $user->id)->count();

        $first = DB::table('demande')->where('id_users', $user->id)->first();

        if($first!==null){
            if($nbdemande<2 && $first->type !== $request->get('type') ) {
                $statement = DB::select("SHOW TABLE STATUS LIKE 'demande'");
                $nextId = $statement[0]->Auto_increment;
                $request->request->add(['documents' => 'http://127.0.0.1:8887/doc1/'.$request->get('type').'_'. $nextId.'_'.$user->id.'_docs.pdf']);
                demande::create($request->all());

                $file=  $request->file('document')->move('C:\Users\MEH\Desktop\new projet\GDPV2\documentprojet\doc1', DB::table('demande')->latest('id')->first()->type.'_'.DB::table('demande')->latest('id')->first()->id.'_'.$user->id.'_docs.pdf');

                return redirect()->back()->with('message', ' Votre demande a bien été envoyé');
            }
            else
            {
                if($nbdemande>=2)
                {
                    return redirect()->back()->with('message', ' Echec: vous avez déja fait 2 demandes');
                }
                else
                {
                    return redirect()->back()->with('message', ' Echec: vous avez déja fait une demande du meme type');
                }
            }
        }
        else {
            $statement = DB::select("SHOW TABLE STATUS LIKE 'demande'");
            $nextId = $statement[0]->Auto_increment;
            $request->request->add(['documents' => 'http://127.0.0.1:8887/doc1/'.$request->get('type').'_'.$nextId.'_'.$user->id.'_docs.pdf']);
            demande::create($request->all());

            $file=  $request->file('document')->move('C:\Users\MEH\Desktop\new projet\GDPV2\documentprojet\doc1', DB::table('demande')->latest('id')->first()->type.'_'.DB::table('demande')->latest('id')->first()->id.'_'.$user->id.'_docs.pdf');
            return redirect()->back()->with('message', ' Votre demande a bien été envoyé');
        }
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
        $demande = Demande::find($id);
        return view('Vue_SimpleAgent.ModificationPret', compact('demande'));
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
        $request->validate([
            'type'=>'required',

        ]);
        $user = Auth::user();

        $demande = Demande::find($id);

        $nbdemande = DB::table('demande')->where('id_users', $user->id)->count();
        $first = DB::table('demande')->where('id_users', $user->id)->first();
        $last = DB::table('demande')->where('id_users', $user->id)->orderBy('id', 'desc')->first();;

        if($demande->valid_cu===0 && $request->get('type')!== $first->type && $request->get('type')!== $last->type)
        {
            $demande->type =  $request->get('type');
            $demande->save();
            return redirect()->back()->with('message', 'Votre demande a bien été modifiée');
        }else
        {
            if($request->get('type')== $first->type || $request->get('type')== $last->type){
            return redirect()->back()->with('message', 'Vous avez déja fait une demande du meme type');
            }
            else{
                return redirect()->back()->with('message', 'Votre demande a déja été validé par le chef d\'unité');
            }
        }
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function setValidCU( Request $request,$id)
    {
        $demande = Demande::find($id);
        $user = User::find($demande->id_users);


        $demande->valid_cu=true;

        $demande->save();
        $details = [
            'type'=>$demande->type,
            'etat'=>$demande->statut,
            'motif'=>'',
            'sender'=>'CHEFUNITE',
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from ItSolutionStuff.com',
            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => $id
        ];
        $user->notify(new MyFirstNotification($details));

       // event(new DemandeValidCU( $demande,"hi"));
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function setRefusCU( Request $request,$id)
    {
        $request->validate([
            'motif'=>'required',

        ]);
        $demande = Demande::find($id);
        $user = User::find($demande->id_users);








        $demande->valid_cu=true;
        $demande->statut="Refusé";
      //  $agent=User::find($demande->id_users);

       // $agent->notify(new RepliedToThread($user));
        $demande->save();
        $details = [
            'type'=>$demande->type,
            'etat'=>$demande->statut,
            'motif'=>$request->get('motif'),
            'sender'=>'CHEFUNITE',
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from ItSolutionStuff.com',
            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => $id
        ];
        $user->notify(new MyFirstNotification( $details ));

       // event(new DemandeValidCU( $demande,"hi"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $demande = Demande::find($id);
        if($demande->valid_cu===0){
            $demande->delete();
            return redirect()->back()->with('message', 'Deleted!');
        }
    }

         /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function setValidADM( Request $request,$id)
    {
        $demande = Demande::find($id);
        $user = User::find($demande->id_users);








        $demande->valid_cl=true;
      //  $agent=User::find($demande->id_users);

       // $agent->notify(new RepliedToThread($user));
        $demande->save();
        $details = [
            'type'=>$demande->type,
            'etat'=>$demande->statut,
            'motif'=>'',
            'sender'=>'ADMINISTRATEUR',
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from ItSolutionStuff.com',
            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => $id
        ];
        $user->notify(new MyFirstNotification($details));

       // event(new DemandeValidCU( $demande,"hi"));
        return redirect()->back();
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function setRefusADM( Request $request,$id)
    {
        $request->validate([
            'motif'=>'required',

        ]);
        $demande = Demande::find($id);
        $user = User::find($demande->id_users);

        $demande->valid_cl=true;
        $demande->statut="Refusé";

        $demande->save();
        $details = [
            'type'=>$demande->type,
            'etat'=>$demande->statut,
            'motif'=>$request->get('motif'),
            'sender'=>'ADMINISTRATEUR',
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from ItSolutionStuff.com',
            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => $id
        ];
        $user->notify(new MyFirstNotification( $details ));

       // event(new DemandeValidCU( $demande,"hi"));
        return redirect()->back();
    }
}
