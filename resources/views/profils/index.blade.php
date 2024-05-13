@extends('layouts.appN')
@section('title','Profil')

@section('content')

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">User Profile</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="#">Acceuil</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
       
      </div>
    </div>
</div>

<div class="card">
  <div class="card-body">
    <form class="form-horizontal">
      <div class="form-body">
        <div class="card-body">
          <h5 class="card-title mb-0">Information Personnel</h5>
        </div>
        <hr class="m-0">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="form-label text-end col-md-4">Nom l'utlisateur :</label>
                <div class="col-md-8">
                  <p> {{ Auth::user()->name }} </p>
                </div>
              </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
              <div class="form-group row">
                <label class="form-label text-end col-md-4">L'address email:</label>
                <div class="col-md-8">
                  <p>{{ Auth::user()->email }}</p>
                </div>
              </div>
            </div>
            <!--/span-->
          </div>
    

        </div>
        {{-- <hr class="m-0">
   
        <div class="form-actions border-top">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-primary">
                      <i class="ti ti-edit fs-5"></i>
                      Edit
                    </button>
                    <button type="button" class="btn bg-danger-subtle text-danger ms-6">
                      Cancel
                    </button>
                  </div>
                </div>
              </div>
              <div class="col-md-6"></div>
            </div>
          </div>
        </div> --}}
      </div>
    </form>
  </div>
</div>


@endsection