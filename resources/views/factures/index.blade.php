@extends('layouts.appF')
@section('title','Province')

@section('content')

<div class="card">
  <div class="card-body">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="w-xs-100 chat-container">
                <div class="invoice-inner-part h-100">
                  <div class="invoiceing-box">
                    <div class="invoice-header d-flex align-items-center border-bottom p-3">
                      <h4 class=" text-uppercase mb-0" _msttexthash="94705" _msthash="526">Liste des Réunions</h4>
                      <div class="ms-auto">
                        <h4 class="invoice-number">La date d'aujourd'hui : {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }} </h4>
                      </div>
                    </div>
                    <div class="p-3" id="custom-invoice">
                      <div class="invoice-123" id="printableArea" style="display: block;">
                        <div class="row pt-3">
                          <div class="col-md-12">
                            <div class="table-responsive mt-5">
                              <table class="table table-responsive text-nowrap align-middle" id="zero_table">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">ID</th> --}}
                                        <th scope="col">Date de la réunion</th>
                                        <th scope="col">Prochaine Réunion</th>
                                        <th scope="col">Sujet de la réunion</th>
                                        <th scope="col">Saisie Par</th>
                                        <th scope="col">Date de Saisie</th>
                                        <th scope="col">Date de Modification</th>
                                        <th scope="col">Suggestion</th>
                                        <th scope="col">Cadre</th>
                                        <th scope="col">Cout Cadre</th>
                                        <th scope="col">Nom Divisions</th>
                                        <th scope="col">Nom Secteurs</th>
                                        <th scope="col">Nom Partenaires</th>
                                        <th scope="col">Nom Statuts</th>
                                        <th scope="col">Contribution Partenaire</th>
                                        <th scope="col">Etat Avancement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reuniones as $reunion)
                                    
                                        <tr>
                                            {{-- <td>{{ $reunion->id }}</td> --}}
                                            <td>{{ $reunion->date_reunion }}</td>
                                            <td>{{ $reunion->prochaine_reunion }}</td>
                                            <td>{{ $reunion->sujet_reunion }}</td>
                                            <td>{{ $reunion->saisi_par }}</td>
                                            <td>{{ $reunion->date_de_saisie }}</td>
                                            <td>{{ $reunion->date_de_modification }}</td>
                                            <td>{{ $reunion->suggestion }}</td>
                                            <td>{{ $reunion->cadre }}</td>
                                            <td>{{ $reunion->cout_cadre }}</td>
                                            <td>{{ $reunion->nom_division }}</td>
                                            <td>{{ $reunion->nom_secteur }}</td>
                                            <td>{{ $reunion->nom_partenaire }}</td>
                                            <td>{{ $reunion->nom_statut }}</td>
                                            <td>{{ $reunion->contribution_partenaire }}</td>
                                            <td>{{ $reunion->etat_avancement }}</td>
                                          
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-end">
                             
                              <button class="btn btn-primary btn-default print-page ms-6" type="button" onclick="printInLandscapeA3()">
                                <span _msttexthash="115739" _msthash="555">  <i class="ti ti-printer fs-5" _istranslated="1"></i> Imprimer </span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                  
                  
                    </div>
                  </div>
                </div>
              </div>


        </div>
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
      function printInLandscapeA3() {
            window.print({
                orientation: 'landscape',
                paperSize: 'A3'
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#zero_table').DataTable({
                scrollX: true,
                lengthChange: false, 
                info: false ,
                layout: {
                    topStart: 'buttons',  
                },
                buttons: [
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
