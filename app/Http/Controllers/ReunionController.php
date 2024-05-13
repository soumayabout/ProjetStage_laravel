<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Partenaire;
use App\Models\Reunion;
use App\Models\Secteur;
use App\Models\Statut;
use App\Models\UploadedFile;
use Illuminate\Support\Facades\Response;

class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Retrieve all reunions from the database and paginate them
        $reunions = Reunion::latest()->paginate(60);

        // Return the index view with the reunions data
        return view('reuniones.index', compact('reunions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reunion = new Reunion();
        $divisions = Division::all();
        $secteurs = Secteur::all();
        $partenaires = Partenaire::all();
        $statuts = Statut::all();
        $uploadedFiles = UploadedFile::all();


        return view('reuniones.create', compact('reunion', 'divisions', 'secteurs', 'partenaires', 'statuts', 'uploadedFiles'));
    }
    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'date_reunion' => 'required|date',
            'sujet_reunion' => 'required|string',
            'prochaine_reunion' => 'nullable|date',
            'divisions_id' => 'nullable|exists:divisions,id',
            'nom_division' => 'nullable|exists:divisions,nom_division',
            'nom_partenaire' => 'nullable|exists:partenaires,nom_partenaire',
            'nom_statut' => 'nullable|exists:statuts,nom_statut',
            'nom_secteur' => 'nullable|exists:secteurs,nom_secteur',
            'suggestion' => 'nullable|string',
            'cadre' => 'nullable|string',
            'cout_cadre' => 'nullable|numeric',
            'secteurs_id' => 'nullable|exists:secteurs,id',
            'partenaires_id' => 'nullable|exists:partenaires,id',
            'contribution_partenaire' => 'nullable|numeric',
            'statuts_id' => 'nullable|exists:statuts,id',
            'etat_avancement' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip,rar,7z,jpg,jpeg,png,gif,bmp|max:10240',
        ]);

        // Assign a default value to 'divisions_id' if it's null
        $validatedData['divisions_id'] = $validatedData['divisions_id'] ?? 1;

        // Create a new instance of Reunion with the validated data
        $reunion = Reunion::create($validatedData);

        // Check if a file is uploaded
        if ($request->hasFile('file_path')) {
            // Call the import method to handle the file upload
            $this->import($request->file('file_path'), $reunion);
        }

        // Redirect with a success message
        return redirect()->route('reuniones.index')->with('success', 'Réunion créée avec succès.');
    }

    /**
     * Process the uploaded file.
     */
    private function import($file, Reunion $reunion)
    {
        // Store the file and update the file_path attribute of the reunion
        $reunion->update(['file_path' => $file->store('reunion_files')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the reunion by its ID
        $reunion = Reunion::findOrFail($id);
        // Return the show view with the reunion data
        return view('reuniones.show', compact('reunion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the reunion by its ID
        $reunion = Reunion::findOrFail($id);
        // Retrieve all divisions, secteurs, partenaires, and statuts for dropdowns
        $divisions = Division::all();
        $secteurs = Secteur::all();
        $partenaires = Partenaire::all();
        $statuts = Statut::all();

        // Return the edit view with the reunion and dropdown data
        return view('reuniones.edit', compact('reunion', 'divisions', 'secteurs', 'partenaires', 'statuts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reunion $reunion)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'date_reunion' => 'required|date',
            'sujet_reunion' => 'required|string',
            'divisions_id' => 'nullable|exists:divisions,id',
            'nom_division' => 'nullable|exists:divisions,nom_division',
            'nom_partenaire' => 'nullable|exists:partenaires,nom_partenaire',
            'nom_statut' => 'nullable|exists:statuts,nom_statut',
            'nom_secteur' => 'nullable|exists:secteurs,nom_secteur',
            'suggestion' => 'nullable|string',
            'cadre' => 'nullable|string',
            'cout_cadre' => 'nullable|numeric',
            'secteurs_id' => 'nullable|exists:secteurs,id',
            'partenaires_id' => 'nullable|exists:partenaires,id',
            'contribution_partenaire' => 'nullable|numeric',
            'statuts_id' => 'nullable|exists:statuts,id',
            'etat_avancement' => 'nullable|string',
        ]);

        // Update the reunion with the validated data
        $reunion->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('reuniones.index')->with('success', 'La réunion a bien été mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Trouver la réunion par son identifiant
        $reunion = Reunion::findOrFail($id);

        // Supprimer la réunion
        $reunion->delete();

        // Rediriger avec un message de succès
        return redirect()->route('reuniones.index')->with('success', 'Réunion supprimée avec succès.');
    }

    /**
     * 
     * Download the file associated with a reunion.
     */
    public function download(Reunion $reunion)
    {
        // Retrieve all the details of the reunion
        $details = [
            'Date de la réunion' => $reunion->date_reunion,
            'Sujet de la réunion' => $reunion->sujet_reunion,
            'division' => $reunion->division->nom_division ?? '',
            'Suggestion' => $reunion->suggestion,
            'Prochaine réunion' => $reunion->prochaine_reunion ?? 'Non spécifié',
            'Cadre' => $reunion->cadre,
            'Nom Secteurs' => $reunion->secteur->nom_secteur ?? '',
            'Nom Partenaires' => $reunion->partenaire->nom_partenaire ?? '',
            'Contribution partenaire' => $reunion->contribution_partenaire,
            'Nom Statuts' => $reunion->statut->nom_statut ?? ''
        ];

        // Convert the details to CSV format
        $headers = array_keys($details);
        $values = array_map(function ($value) {
            return is_string($value) ? '"' . str_replace('"', '""', $value) . '"' : $value;
        }, array_values($details));

        $csv = implode(',', $headers) . "\n" . implode(',', $values);

        // Create a response with the CSV content
        $response = response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="reunion_details.csv"'
        ]);

        return $response;
    }


    public function datafichier($reunionId)
    {
        // Récupérer la réunion
        $reunion = Reunion::findOrFail($reunionId);

        // Récupérer les fichiers téléchargés liés à la réunion
        $uploadedFiles = UploadedFile::where('reunions_id', $reunionId)->get();

        // Passer les données à la vue
        return view('reuniones.datafichier', compact('reunion', 'uploadedFiles'));
    }


    // public function export(Reunion $reunion)
    // {
    //     if ($reunion->file_path) {
    //         // Construire le chemin complet du fichier
    //         $filePath = storage_path('app/' . $reunion->file_path);

    //         // Vérifier si le fichier existe
    //         if (file_exists($filePath)) {
    //             // Retourner le fichier pour téléchargement
    //             return response()->download($filePath);
    //         } else {
    //             // Retourner une réponse 404 si le fichier n'existe pas
    //             abort(404);
    //         }
    //     } else {
    //         // Retourner une réponse 404 si aucun fichier n'est associé à la réunion
    //         abort(404);
    //     }
    // }
public function upload(Request $request)
{
    $request->validate([
        'file.*' => 'required|mimes:csv,txt,xls,xlsx,pdf,jpg|max:2048',
    ]);

    if ($request->hasFile('file')) {
        foreach ($request->file('file') as $uploadedFile) {
            $name = $uploadedFile->getClientOriginalName();
            $path = $uploadedFile->store('uploads', 'public');

            UploadedFile::create([
                'file_name' => $name,
                'file_content' => '/storage/' . $path,
                'reunions_id' => $request->input('reunions_id'),
            ]);
        }

        return redirect()->back()->with('success', 'Fichiers importés avec succès.');
    }

    return redirect()->back()->with('error', 'Aucun fichier n\'a été importé.');
}

    public function rechercher(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
            'critere' => 'required|string|in:id,divisions_id,secteurs_id,partenaires_id',
        ]);

        $query = $request->input('query');
        $critere = $request->input('critere');

        $resultats = Reunion::where($critere, 'LIKE', "%{$query}%")->paginate(20);

        return view('reuniones.index', ['reuniones' => $resultats]);
    }
    public function calendar(Request $request)
    {
        $events = [];
        $reunions = Reunion::all();
        return view('reuniones.calendar', compact('reunions'));
       
    }
    public function parametre()
    {
        // Mettez ici la logique pour récupérer les paramètres et passer les données à la vue
        return view('reuniones.parametre');
    }
}
