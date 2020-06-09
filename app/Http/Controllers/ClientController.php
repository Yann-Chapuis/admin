<?php

namespace App\Http\Controllers;

use App;
use App\Client;
use App\Contact;
use App\Mission;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Repositories\MissionRepository;
//use App\Repositories\ClientRepository;

//use App\Repositories\ArtistRepository;

class ClientController extends Controller
{

    protected $missionR;

    public function __construct(MissionRepository $missionR)
    {
        //$this->missions = $missionR;
    }

    public function index(Request $request)
    {
        $client = Client::OrderByUpdate()->get();

        return view('admin.clients.list', ['clients' => $client]);
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
            
        if($request->picture) {

            $request->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;
            $imageName = 'client_'.$user_id.'_'.$user_name.'_'.time().'.'.$request->picture->extension();

            $request->picture->move(public_path('img/clients'), $imageName);

            // Permet de personaliser le nom de l'image à inscrire dans la base de données
            $value_form=$request->all();
            $value_form['picture']=$imageName;
            // On intégre dans la bdd
            $new_client = Client::create($value_form);
        }
        else {
            $new_client = Client::create($request->all());
        }
        return redirect()->route('clients.edit', [$new_client->id])->with('info', 'Le client a bien été créée');

    }

    public function show(Client $client)
    {
        $contacts = $client->contacts;
        $missions = $client->missions;
        $count_days = $this->missions->getCountDays($client->missions->id);

        $total = $client->missions->sum('total_amount');
         //dd($total);       
        return view('admin.clients.show', compact('client', 'contacts', 'missions', 'total', 'temps_total'));
    }

    public function edit(Client $client)
    {
        //
    }

    public function update(Request $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('info', 'Le client a bien été supprimé dans la base de données.');
    }
}
