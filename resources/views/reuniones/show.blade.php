@extends('layouts.appN')
@section('title', 'DÉTAILS')

@section('content')

    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9" id="myTable">
                    <h4 class="fw-semibold mb-8">DÉTAILS DE LA RÉUNION</h4>
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
                <div class="col-md-12 mx-auto">
                    <div class="w-xs-100 chat-container" id='myTable'>
                        <div class="invoice-inner-part h-100">
                            <div class="invoiceing-box">
                                <div class="invoice-header d-flex align-items-center border-bottom p-3">
                                    <h4 class=" text-uppercase mb-0" _msttexthash="94705" _msthash="526">Détails de la
                                        réunion</h4>
                                </div>
                                <div class="p-3" id="custom-invoice">
                                    <div class="invoice-123" id="printableArea" style="display: block;">
                                        <div class="row pt-3">
                                            <div class="col-md-12">
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <strong>Date de la réunion :</strong>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        {{ $reunion->date_reunion }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <strong>Sujet de la réunion :</strong>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        {{ $reunion->sujet_reunion }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <strong>Suggestion :</strong>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        {{ $reunion->suggestion }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <strong>Division :</strong>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        {{ $reunion->division->nom_division }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <strong>Prochaine réunion :</strong>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        {{ $reunion->prochaine_reunion }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <strong>Cadre</strong>
                                                    </div>
                                                    <div class="col-sm-9">{{ $reunion->cadre }}</div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <strong> Secteurs</strong>
                                                    </div>
                                                    <div class="col-sm-9">{{ $reunion->secteur->nom_secteur }}</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <strong>Partenaires</strong>
                                                    </div>
                                                    <div class="col-sm-9">{{ $reunion->partenaire->nom_partenaire }}</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <strong>Contribution partenaire</strong>
                                                    </div>
                                                    <div class="col-sm-9">{{ $reunion->contribution_partenaire }}</div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <strong>Statuts </strong>
                                                    </div>
                                                    <div class="col-sm-9">{{ $reunion->statut->nom_statut }}</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                @isset($reunion->prochaine_reunion)
                                                    {{ $reunion->prochaine_reunion }}
                                                @else
                                                    Non spécifié
                                                @endisset
                                            </div>
                                            <div class="col-md-12">
                                                <div class="clearfix"></div>
                                                <hr>
                                                <div class="card-footer">

                                                    <a href="{{ route('download', $reunion->id) }}"
                                                        class="btn btn-outline-primary"><i class="fas fa-download"></i>
                                                        Télécharger</a>
                                                    <a href="{{ route('reuniones.index', $reunion->id) }}"
                                                        class="btn btn-outline-primary"><i class=""></i>
                                                        Retour</a>
                                                </div>
                                                <div class="text-end">

                                                    <button class="btn btn-primary btn-default print-page ms-6"
                                                        type="button" onclick="printTable()">
                                                        <span _msttexthash="115739" _msthash="555"> <i
                                                                class="ti ti-printer fs-5" _istranslated="1"></i> Imprimer
                                                        </span>
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

@section('scripts')

    <script>
        function printTable() {
            var invoiceContent = document.getElementById('myTable').innerHTML;
            var myTable = document.getElementById('myTable');
            var printWindow = window.open('', '_blank');
            printWindow.document.write(`
        <html>
        <head>
            <title>La facture d'impression</title>
            <!-- Add your CSS styles here -->
           <style>

            .pl {
              padding-left : 30px !important;
            }
            .card {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    margin-bottom: 20px;
}

.card-body {
    padding: 20px;
}

.invoice-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.invoiceing-box {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
}

.invoice-number {
    font-size: 1.25rem;
}

.row {
    margin-bottom: 15px;
}

.col-sm-3 {
    width: 25%;
    float: left;
    font-weight: bold;
}

.col-sm-9 {
    width: 75%;
    float: left;
}

.text-uppercase {
    text-transform: uppercase;
}

.text-end {
    text-align: right;
}

.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    cursor: pointer;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
}

.btn-default {
    color: #212529;
    background-color: #e9ecef;
    border-color: #e9ecef;
}

.btn-default:hover {
    color: #212529;
    background-color: #dee2e6;
    border-color: #d3d9df;
}

.col-md-12 {
    width: 100%;
}
/* Padding */
.p-3 {
    padding: 1rem !important; /* Adjust padding as needed */
}

/* Margin Bottom */
.mb-3 {
    margin-bottom: 1rem !important; /* Adjust margin as needed */
}

/* Flexbox */
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

/* Column Width */
.col-sm-9 {
    flex: 0 0 75%;
    max-width: 75%;
}

/* Full Height */
.h-100 {
    height: 100%;
}

/* Margin Auto */
.mx-auto {
    margin-right: auto;
    margin-left: auto;
}

/* Width 100% Extra Small */
.w-xs-100 {
    width: 100% !important; /* Adjust width as needed */
}

.invoice-footer {
    text-align: center;
    padding: 20px;
    background-color: #f8f9fa; /* Change the background color as needed */
    border-top: 1px solid #dee2e6; /* Add a border on top */
    position: fixed;
    bottom: 0;
    width: 100%;
}
.invoice-container {
    max-width: 800px; /* Adjust maximum width as needed */
    margin: 0 auto; /* Center the container horizontally */
    padding: 20px; /* Add padding around the container */
    background-color: #ffffff; /* Set background color */
    border: 1px solid #dee2e6; /* Add a border */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
}
.invoice-header {
    text-align: center; /* Center the text */
    padding: 20px; /* Add padding */
    background-color: #ffffff; /* Set background color */
    border-bottom: 1px solid #dee2e6; /* Add a border at the bottom */
    margin-bottom: 20px; /* Add some space below the header */
}

.invoice-header p {
    margin: 0; /* Remove default margin for the heading */
}
            </style>
        </head>
        <body>
          <!-- Invoice Container -->
         
        <header class="invoice-header">
            <h1></h1>
           
            <p>Date: <?php echo date('d/m/Y'); ?></p>
        </header>

          <div class="invoice-container">
            <div class="">
            <div class="" style="margin: 20px;">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="w-xs-100 chat-container" id='myTable'>
                            <div class="invoice-inner-part h-100">
                                <div class="invoiceing-box">
                                    <div class="invoice-header border-bottom p-3">
                                    <div class="d-flex justify-content-start align-items-center mb-3"> 
                                        <div style="flex: 0 0 auto; margin-right: 15px;"> 
                                                <img src="{{ asset('assets/images/logos/logo.jpg') }}" width="64">
                                            </div>
                                            <h4 class="text-uppercase mb-0">Détails de la réunion</h4>
                                        </div>
                                    </div>

                                    <div class="p-3" id="custom-invoice">
                                        <div class="invoice-123" id="printableArea">
                                            <div class="row pt-3 pl">
                                                <div class="col-md-12">
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <strong>Date de la réunion :</strong>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            {{ $reunion->date_reunion }}
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <strong>Sujet de la réunion :</strong>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            {{ $reunion->sujet_reunion }}
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <strong>Suggestion :</strong>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            {{ $reunion->suggestion }}
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <strong>Prochaine réunion :</strong>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            {{ $reunion->prochaine_reunion }}
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <strong>Cadre</strong>
                                                        </div>
                                                        <div class="col-sm-9">{{ $reunion->cadre }}</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <strong>Nom Secteurs</strong>
                                                        </div>
                                                        <div class="col-sm-9">{{ $reunion->secteur->nom_secteur }}</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <strong>Nom Partenaires</strong>
                                                        </div>
                                                        <div class="col-sm-9">{{ $reunion->partenaire->nom_partenaire }}</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <strong>Contribution partenaire</strong>
                                                        </div>
                                                        <div class="col-sm-9">{{ $reunion->contribution_partenaire }}</div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <strong>Nom Statuts</strong>
                                                        </div>
                                                        <div class="col-sm-9">{{ $reunion->statut->nom_statut }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="clearfix"></div>
                                                    <hr>
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

            
         <footer class="invoice-footer">
              <p>&copy; 2024 Tous droits réservés.</p>
          </footer>

        </body>
        </html>
    `);
            printWindow.document.close();
            printWindow.print();
        }
    </script>

@endsection
