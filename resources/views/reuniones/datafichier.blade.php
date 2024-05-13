@extends('layouts.appN')

@section('title', 'Importation de Fichiers')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Importer des Fichiers</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="reunions_id" value="{{ $reunion->id }}">
            <div class="mb-3">
                <label for="file" class="form-label">Choisir un fichier à importer :</label>
                <input type="file" multiple name="file[]" class="form-control-file" id="file" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Importer</button>
            </div>
        </form>
        <div class="mb-3">
            <h4>Liste des fichiers importés</h4>
            @if (isset($uploadedFiles) && $uploadedFiles->isNotEmpty())
            <ul>
                @foreach ($uploadedFiles as $file)
                <li>
                    <a href="{{ asset($file->file_content) }}" class="btn btn-success">{{ $file->file_name }}</a>
                </li>
                @endforeach
            </ul>
            @else
            <p>Aucun fichier n'a été importé.</p>
            @endif
        </div>
        <a href="{{ route('reuniones.index') }}" class="btn btn-secondary">Retour à la liste des réunions</a>
    
    </div>
</div>

@endsection
