@extends('layouts.appN')
@section('title','Reunion')

@section('content')

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Ajouter Réunion</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="#">Acceuil</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">Réunion</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="{{ route('reuniones.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="date_reunion" class="form-label">Date de la réunion</label>
                            <input id="date_reunion" name="date_reunion" type="date" class="form-control" value="{{ old('date_reunion') }}">
                            @error('date_reunion')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="sujet_reunion" class="form-label">Sujet de la réunion</label>
                            <input type="text" name="sujet_reunion" id="sujet_reunion" class="form-control " value="{{ old('sujet_reunion') }}">
                            @error('sujet_reunion')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="nom_division" class="form-label">Nom division</label>
                            <select name="id_divisions" id="id_divisions" class="form-control">
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}" name="id_divisions" id="id_divisions" >{{ $division->nom_division }}</option>
                                @endforeach
                            </select>
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="suggestion" class="form-label">Suggestion</label>
                            <textarea name="suggestion" id="suggestion" rows="3" class="form-control">{{ old('suggestion') }}</textarea>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="prochaine_reunion" class="form-label">Prochaine réunion</label>
                            <input type="date" name="prochaine_reunion" id="prochaine_reunion" class="form-control">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="saisie_par" class="form-label">Saisie par</label>
                            <input type="text" name="saisie_par" id="saisie_par" class="form-control">
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="date_de_modification" class="form-label">Date de modification</label>
                            <input type="datetime-local" name="date_de_modification" id="date_de_modification" class="form-control">
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="cadre" class="form-label">Cadre</label>
                            <input type="text" name="cadre" id="cadre" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="cout_cadre" class="form-label">Coût Cadre</label>
                            <input type="number" name="cout_cadre" id="cout_cadre" class="form-control">
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="nom_secteur" class="form-label">Nom Secteur</label>
                            <select name="secteurs_id" id="secteurs_id" class="form-control">
                                @foreach($secteurs as $secteur)
                                    <option value="{{ $secteur->id }}">{{ $secteur->nom_secteur }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="partenaires_id" class="form-label">Nom partenaire</label>
                            <select name="partenaires_id" id="partenaires_id" class="form-control">
                                @foreach($partenaires as $partenaire)
                                    <option value="{{ $partenaire->id }}">{{ $partenaire->nom_partenaire }}</option>
                                @endforeach
                            </select>
                        </div>
                
                      
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="contribution_partenaire" class="form-label">Contribution du partenaire</label>
                    <input type="number" step="0.0001" name="contribution_partenaire" id="contribution_partenaire" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="statuts_id" class="form-label">Nom statut</label>
                            <select name="statuts_id" id="statuts_id" class="form-control">
                                @foreach($statuts as $statut)
                                    <option value="{{ $statut->id }}">{{ $statut->nom_statut }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="etat_avancement" class="form-label">État d'avancement</label>
                            <input type="text" name="etat_avancement" id="etat_avancement" class="form-control">
                        </div>
                    </div>
                </div>
                            <div class="form-group mb-3">
                                <label for="file_path" class="form-label">Choisir un fichier</label>
                                <div class="input-group">
                                    <input type="file" name="file_path" id="file_path" class="form-control">
                                    <label class="input-group-text" for="file_path">Parcourir</label>
                                </div>
                            </div>
                            <!-- Ajoutez le lien de téléchargement ici -->
                            @if ($reunion->file_path)
                            <div class="form-group mb-3">
                                <label for="file_path" class="form-label">Fichier associé</label>
                                <a href="{{ route('reuniones.import', $reunion->id) }}" target="_blank">importer</a>
                            </div>
                            @endif
                        </div>
                    </div>
              
                     
            
                
                <!-- Affichage des erreurs de validation -->
                @if ($errors->any())
                <div class="mb-3">
                    @foreach ($errors->all() as $error)
                    <div class="alert customize-alert alert-dismissible rounded-pill alert-light-danger bg-danger-subtle text-danger fade show remove-close-icon" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div class="d-flex align-items-center  me-3 me-md-0">
                          <i class="ti ti-info-circle fs-5 me-2 text-danger"></i>
                          {{ $error }}
                        </div>
                    </div>
                    @endforeach
                  
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
            </div>
  </div>
</div>


@endsection

