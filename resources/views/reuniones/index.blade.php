@extends('layouts.appN')
@section('title', 'ListeReunion')

@section('content')

    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Liste des Réunions</h4>
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
            <div class="container mt-3">
               
                <div class="col-sm-3">
                    <a type="submit" class="btn btn-primary"  href="{{ route('reuniones.create') }}" >Ajouter Réunions</a>
                </div>
            </div>

            <br>
            <div class="table-responsive text-nowrap align-middle" >
                <table class="table table-responsive text-nowrap align-middle" id="zero_table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Date de la réunion</th>
                            <th scope="col">Sujet de la réunion</th>
                            <th scope="col">Suggestion</th>
                            <th scope="col">Prochaine Réunion</th>
                            <th scope="col">Cadre</th>
                            <th scope="col">Cout Cadre</th>
                            <th scope="col"> Divisions</th>
                            <th scope="col"> Secteurs</th>
                            <th scope="col"> Partenaires</th>
                            <th scope="col">Contribution Partenaire</th>
                            <th scope="col"> Statuts</th>
                            <th scope="col">Etat Avancement</th>
                            <th scope="col">Fichier</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reunions as $reunion)
                        <tr>
                            <td>{{ $reunion->date_reunion }}</td>
                            <td>{{ $reunion->sujet_reunion }}</td>
                            <td>{{ $reunion->suggestion }}</td>
                            <td>{{ $reunion->prochaine_reunion }}</td>
                            <td>{{ $reunion->cadre }}</td>
                            <td>{{ $reunion->cout_cadre }}</td>
                            <td>{{ $reunion->division->nom_division }}</td>
                            <td>{{ $reunion->partenaire->nom_partenaire }}</td>
                            <td>{{ $reunion->secteur->nom_secteur }}</td>
                            <td>{{ $reunion->contribution_partenaire }}</td>
                            <td>{{ $reunion->statut->nom_statut }}</td>
                            <td>{{ $reunion->etat_avancement }}</td>
                            <td>
                                <a href="{{ route('reuniones.datafichier', $reunion->id) }}">importer les fichiers</a>
                            </td>

                            <!-- Actions -->
                            <td>
                                <div class="btn-group" role="group" aria-label="Actions">
                                    {{-- <i class="fas fa-edit"></i> --}}
                                    <a href="{{ route('reuniones.edit', $reunion->id) }}"
                                        class="btn btn-primary"> Modifier</a>
                                    <a href="{{ route('reuniones.show', $reunion->id) }}"
                                        class="btn btn-success"> Détails</a>

                                    <form action="{{ route('reuniones.destroy', $reunion->id) }}" method="POST"
                                        onsubmit="return confirm('Confirmer la suppression!')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- <div class="container mt-3">
            <button
                onclick="if(confirm('Confirmer la suppression!')) { location.href='{{ route('reuniones.destroyAll') }}' }"
                class="btn btn-danger"><i class="fas fa-trash"></i> Supprimer tous</button>
            <button onclick="location.href='{{ route('reuniones.index') }}'" class="btn btn-success"><i
                    class="fas fa-eye"></i> Afficher tous</button>
        </div> --}}
        </div>
    </div>
    </div>


@endsection

@section('css')

  <link href="{{ asset('DataTables/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
  <link href="{{ asset('DataTables/buttons.dataTables.css') }}" rel="stylesheet">
  <link href="{{ asset('DataTables/fixedColumns.dataTables.css') }}" rel="stylesheet">
  

@endsection


@section('scripts')
     
    <script src="{{ asset('DataTables/datatables.js') }}"></script> 
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script> 

    <script src="{{ asset('DataTables/dataTables.buttons.js') }}"></script> 
    <script src="{{ asset('DataTables/buttons.dataTables.js') }}"></script> 
    <script src="{{ asset('DataTables/jszip.min.js') }}"></script> 
    <script src="{{ asset('DataTables/vfs_fonts.js') }}"></script> 
    <script src="{{ asset('DataTables/buttons.html5.min.js') }}"></script> 
    <script src="{{ asset('DataTables/buttons.colVis.min.js') }}"></script> 

    <script>
        $(document).ready(function() {
            $('#zero_table').DataTable({
                scrollX: true,
                layout: {
                    topStart: 'buttons',  
                },
                buttons: [
                    // {   extend:'print',className: 'btn bg-primary-subtle text-primary'},
                    // {   extend: 'copy' ,  className: 'btn bg-primary-subtle text-primary'  },
                    {   extend: 'excel', className: 'btn bg-primary-subtle text-primary' },
                    {
                        extend: 'pdf',
                        title: 'Liste des Réunions',
                        filename: "export_ListeRéunions",
                        className: 'btn bg-primary-subtle text-primary',
                        exportOptions: {
                        columns: ':visible'
                        },

                        

                        layout: 'lightHorizontalLines' ,


                        
                        
                        margin: [0, 20, 0, 8],

                        customize: function(doc) {

                        doc.styles.title.fontSize = 40;
                       
                   
                   
                            doc.footer = (pageNumber, pageCount) => `Page ${pageNumber} de ${pageCount}`;
                            doc.styles.tableHeader = {
                                fillColor: '#F2F2F2',
                                color: '#333',
                                bold: true,
                                alignment: 'center',
                                fontSize: 8,
                                widths: ['*', 'auto'],

                            };
                            doc.styles.tableBodyEven = {
                                fillColor: '#FFF',
                                alignment: 'center',
                                fontSize: 8,
                                widths: ['*', 'auto'],
                            };
                            doc.styles.tableBodyOdd = {
                                fillColor: '#F2F2F2',
                                alignment: 'center',
                                fontSize: 8,
                                widths: ['*', 'auto'],
                            };
                           
                         
                        },
                        
                    },
                    { 
                        extend: 'colvis', 
                        className: 'btn bg-secondary-subtle text-secondary dropdown-toggle',
                        text: 'Visibilité des colonnes' 
                    },
                ]
               
               
                
            });
        });
    </script>
  
@endsection
