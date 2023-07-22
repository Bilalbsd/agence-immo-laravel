<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agent; // Importez le modèle Agent
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    public function show($id)
    {
        $agent = Agent::find($id);
        return view('agents.show', compact('agent'));
    }

    public function create()
    {
        return view('agents.create');
    }

    public function store(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            // Ajoutez d'autres règles de validation ici
        ]);

        // Créer un nouvel agent
        $agent = new Agent;
        $agent->name = $request->input('name');
        $agent->email = $request->input('email');
        $agent->phone = $request->input('phone');
        // Définissez d'autres attributs de l'agent ici

        // Enregistrez l'agent dans la base de données
        $agent->save();

        // Redirigez l'utilisateur vers la page de détails de l'agent créé
        return redirect()->route('agents.show', $agent->id);
    }

    public function edit($id)
    {
        $agent = Agent::find($id);
        return view('agents.edit', compact('agent'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            // Ajoutez d'autres règles de validation ici
        ]);

        // Trouvez l'agent à mettre à jour
        $agent = Agent::find($id);
        $agent->name = $request->input('name');
        $agent->email = $request->input('email');
        $agent->phone = $request->input('phone');
        // Mettez à jour d'autres attributs de l'agent ici

        // Enregistrez les modifications dans la base de données
        $agent->save();

        // Redirigez l'utilisateur vers la page de détails de l'agent mis à jour
        return redirect()->route('agents.show', $agent->id);
    }

    public function destroy($id)
    {
        // Trouvez l'agent à supprimer
        $agent = Agent::find($id);

        // Supprimez l'agent de la base de données
        $agent->delete();

        // Redirigez l'utilisateur vers la liste des agents
        return redirect()->route('agents.index');
    }
}
