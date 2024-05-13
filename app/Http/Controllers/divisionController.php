<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Partenaire;
use App\Models\Secteur;
use App\Models\Statut;

class divisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return  view('divisiones.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return  view('divisiones.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'nom_division' => 'required|string|max:100',
        'nom_secteur' => 'required|string|max:100',
        'nom_partenaire' => 'required|string|max:100',
        'nom_statut' => 'required|string|max:100',
    ]);

    try {
        // Create and save a new Division
        $division = new Division();
        $division->nom_division = $request->nom_division;
        $division->save();

        // Create and save a new Secteur
        $secteur = new Secteur();
        $secteur->nom_secteur = $request->nom_secteur;
        $secteur->save();

        // Create and save a new Partenaire
        $partenaire = new Partenaire();
        $partenaire->nom_partenaire = $request->nom_partenaire;
        $partenaire->save();

        // Create and save a new Statut
        $statut = new Statut();
        $statut->nom_statut = $request->nom_statut;
        $statut->save();

        // Redirect back to the index route with a success message
        return redirect()->route('divisions.index')->with('success', 'Data inserted successfully.');
    } catch (\Exception $e) {
        // Handle any exceptions that occur during the data insertion process
        return redirect()->back()->with('error', 'An error occurred while inserting data.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
