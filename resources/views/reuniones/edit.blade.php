@extends('layouts.appN')
@section('title','Province')

@section('content')

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Modifier Réunion</h4>
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
          <form action="{{ route('reuniones.update', $reunion->id) }}" method="POST">
            @csrf
            @method('PUT')
    
                <div class="mb-3">
                    <label for="date_reunion" class="form-label">Date de la réunion</label>
                    <input type="date" class="form-control" id="date_reunion" name="date_reunion" value="{{ $reunion->date_reunion }}">
                </div>
                <div class="mb-3">
                    <label for="sujet_reunion" class="form-label">Sujet de la réunion</label>
                    <input type="text" class="form-control" id="sujet_reunion" name="sujet_reunion" value="{{ $reunion->sujet_reunion }}">
                </div>
                <div class="mb-3">
                  <label for="nom_division" class="form-label">Nom division</label>
                  <select name="id_divisions" id="id_divisions" class="form-control">
                    @foreach($divisions as $division)
                        <option value="{{ $division->id }}" name="id_divisions" id="id_divisions" >{{ $division->nom_division }}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label for="cadre" class="form-label">Cadre</label>
                    <input type="text" class="form-control" id="cadre" name="cadre" value="{{ $reunion->cadre }}">
                </div>
                {{-- <div class="mb-3">
                    <label for="prochaine_reunion" class="form-label">Prochaine réunion</label>
                    <input type="date" class="form-control" id="prochaine_reunion" name="prochaine_reunion" value="{{ $reunion->prochaine_reunion }}">
                </div> --}}
                <div class="mb-3">
                    <label for="suggestion" class="form-label">Suggestion</label>
                    <textarea class="form-control" id="suggestion" name="suggestion">{{ $reunion->suggestion }}</textarea>
                </div>
                <div class="mb-3">
                  <label for="nom_secteur" class="form-label">Nom Secteur</label>
                  <select name="secteurs_id" id="secteurs_id" class="form-control">
                    @foreach($secteurs as $secteur)
                        <option value="{{ $secteur->id }}">{{ $secteur->nom_secteur }}</option>
                    @endforeach
                </select>
                </div>
                {{-- <div class="mb-3">
                  <label for="partenaires_id" class="form-label">Nom partenaire</label>
                  <select name="partenaires_id" id="partenaires_id" class="form-control">
                    @foreach($partenaires as $partenaire)
                        <option value="{{ $partenaire->id }}">{{ $partenaire->nom_partenaire }}</option>
                    @endforeach
                </select>
                </div> --}}
                <div class="mb-3">
                  <label for="statuts_id" class="form-label">Nom statut</label>
                  <select name="statuts_id" id="statuts_id" class="form-control">
                    @foreach($statuts as $statut)
                        <option value="{{ $statut->id }}">{{ $statut->nom_statut }}</option>
                    @endforeach
                  </select> 
                </div>                   
    
                <button type="submit" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir mettre à jour cette réunion ?')">Mettre à jour</button>
                <a href="{{ route('reuniones.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
     </div>
  </div>
</div>


@endsection

