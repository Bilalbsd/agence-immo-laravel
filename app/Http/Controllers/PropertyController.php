<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property; // Importez le modèle Property
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    public function show($id)
    {
        $property = Property::find($id);
        return view('properties.show', compact('property'));
    }

    public function create()
    {
        return view('properties.create');
    }


    public function store(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'city' => 'required',
            'address' => 'required',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'area' => 'required|numeric',
            // Ajoutez d'autres règles de validation ici
        ]);

        // Créer une nouvelle propriété
        $property = new Property;
        $property->title = $request->input('title');
        $property->description = $request->input('description');
        $property->price = $request->input('price');
        $property->city = $request->input('city');
        $property->address = $request->input('address');
        $property->bedrooms = $request->input('bedrooms');
        $property->bathrooms = $request->input('bathrooms');
        $property->area = $request->input('area');
        $property->agend_id = $request->input('agend_id');
        // Définissez d'autres attributs de propriété ici

        // Enregistrez la propriété dans la base de données
        $property->save();

        // Redirigez l'utilisateur vers la page de détails de la propriété créée
        return redirect()->route('properties.show', $property->id);
    }

    public function update(Request $request, $id)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'city' => 'required',
            'address' => 'required',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'area' => 'required|numeric',
            // Ajoutez d'autres règles de validation ici
        ]);

        // Trouvez la propriété à mettre à jour
        $property = Property::find($id);
        $property->title = $request->input('title');
        $property->description = $request->input('description');
        $property->price = $request->input('price');
        $property->city = $request->input('city');
        $property->address = $request->input('address');
        $property->bedrooms = $request->input('bedrooms');
        $property->bathrooms = $request->input('bathrooms');
        $property->area = $request->input('area');
        $property->agend_id = $request->input('agend_id');
        // Mettez à jour d'autres attributs de propriété ici

        // Enregistrez les modifications dans la base de données
        $property->save();

        // Redirigez l'utilisateur vers la page de détails de la propriété mise à jour
        return redirect()->route('properties.show', $property->id);
    }

    public function destroy($id)
    {
        // Trouvez la propriété à supprimer
        $property = Property::find($id);

        // Supprimez la propriété de la base de données
        $property->delete();

        // Redirigez l'utilisateur vers la liste des propriétés
        return redirect()->route('properties.index');
    }
}