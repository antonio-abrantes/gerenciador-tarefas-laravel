<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Client;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use \App\Services\MinhaClasse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Factory;
use Illuminate\Validation\Validator;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Response;

class ClientController extends Controller
{

    //protected $minhaClasse;

    //public function __construct(MinhaClasse $minhaClasse)
    public function __construct()
    {
        $this->middleware('alerttasks')->except('create');
        //$this->minhaClasse = $minhaClasse;
    }

    public function index(Request $request)
    {
//        $request->session()->regenerate();
//        session(['cursos' => ['Laravel', 'Slim', 'JavaScrip']]);
//        var_dump(session('todotasks'));

        //Log::info("O Usuario " . Auth::user()->name . " acessou a lista de clientes!");
        //dd($this->minhaClasse);

        $clientes = \App\Client::paginate(5);

        return view('clients.index', compact('clientes'));
        //return $clientes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
//        $request->validate([
//            'name'=> ['required', 'max:100', 'min:5'],
//            'email'=>['required', 'email', 'unique:clients'],
//            'age'=>['required', 'integer'],
//            'photo'=>['required','mimes:jpeg,jpg,bmp,png']
//        ]);

        $client = new \App\Client();

        if($request->hasFile('photo')){
            $client->photo = $request->photo->store('public');
        }

        $client->user_id = Auth::User()->id;
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->age = $request->input('age');

        //dd($client->user_id);

        if($client->save()){
            $request->session()->flash('success', 'Cliente cadastrado com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro ao cadastrar cliente');
        }

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
    public function show(Client $client)
    {
//        $client = \App\Client::findOrFail($id);

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = \App\Client::findOrFail($id);

        $this->authorize('update-client', $client);

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Factory $validator,Request $request, $id)
    {
        $validation = $validator->make($request->all(),[
            'name'=> ['required', 'max:100', 'min:5'],
            'email'=>['required', 'email', 'unique:clients'],
            'age'=>['required', 'integer'],
            'photo'=>['mimes:jpeg,jpg,bmp,png']
        ]);//Opcional

        if ($validation->fails()){
            return redirect()
                ->route('clients.edit', $id)
                ->withErrors($validation)
                ->withInput();
        }

        $client = \App\Client::find($id);

        $this->authorize('update-client', $client);

        if($request->hasFile('photo')){
            $client->photo = $request->photo->store('public');
        }

        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->age = $request->input('age');

        if($client->save()){
            $request->session()->flash('success', 'Cliente atualizado com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro ao atualizar cliente');
        }

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $client = \App\Client::find($id);

        $this->authorize('update-client', $client);

        if($client->delete()){
            $request->session()->flash('success', 'Cliente deletado com sucesso!');
        }else{
            $request->session()->flash('error', 'Erro ao deletar cliente');
        }
        return redirect()->route('clients.index');
    }
}
