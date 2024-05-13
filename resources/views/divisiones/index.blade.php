@extends('layouts.appN')
@section('title','Divisions')

@section('content')

<form action="{{ route('divisions.store') }}" method="POST">
  @csrf
  <div class="mb-3">
      <label for="nom_division" class="form-label">Nom de la division :</label>
      <input type="text" name="nom_division" class="form-control" id="nom_division" required>
  </div>
  <div class="mb-3">
      <label for="nom_secteur" class="form-label">Nom du secteur :</label>
      <input type="text" name="nom_secteur" class="form-control" id="nom_secteur" required>
  </div>
  <div class="mb-3">
      <label for="nom_partenaire" class="form-label">Nom du partenaire :</label>
      <input type="text" name="nom_partenaire" class="form-control" id="nom_partenaire" required>
  </div>
  <div class="mb-3">
      <label for="nom_statut" class="form-label">Nom du statut :</label>
      <input type="text" name="nom_statut" class="form-control" id="nom_statut" required>
  </div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>


@endsection