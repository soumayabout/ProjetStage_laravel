@extends('layouts.appN')
@section('title','Darshboard')

@section('content')



<div class="row">

  <div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100 bg-primary-subtle overflow-hidden shadow-none">
      <div class="card-body position-relative">
        <div class="row">
          <div class="col-sm-7">
            <div class="d-flex align-items-center mb-7">
              <div class="rounded-circle overflow-hidden me-6">
                <img src="../assets/images/profile/user-1.jpg" alt="modernize-img" width="40" height="40">
              </div>
              <h5 class="fw-semibold mb-0 fs-5">Bienvenu {{ Auth::user()->name }}!</h5>
            </div>
            <div class="d-flex align-items-center">
              <div class="border-end pe-4 border-muted border-opacity-10">
                <h3 class="mb-1 fw-semibold fs-6 d-flex align-content-center">La date d'aujourd'hui
                </h3>
                <p class="mb-0 fs-6 text-dark"><i class="ti ti-arrow-up-right fs-6 lh-base text-success"></i> {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                </p>
              </div>
              <div class="ps-4">
                <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                </h3>
                <p class="mb-0 text-dark">
               
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="welcome-bg-img mb-n7 text-end">
              <img src="{{ asset('images/vecteezyai.png') }}" alt="modernize-img" class="  " style="width:400px;height:170px;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-6">
    <div class="card border-start border-info">
      <div class="card-body">
        <div class="d-flex  align-items-center">
          <div>
            <span class="text-info display-6">
              <i class="ti ti-users"></i>
            </span>
          </div>
          <div class="ms-auto">
            <h4 class="card-title fs-7">{{ $usersCount }}</h4>
            <p class="card-subtitle text-info">Utilisateurs</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="card border-start border-danger">
      <div class="card-body">
        <div class="d-flex  align-items-center">
          <div>
            <span class="text-danger display-6">
              <i class="ti ti-users"></i>
            </span>
          </div>
          <div class="ms-auto">
            <h4 class="card-title fs-7">{{ $meetingsCount }}</h4>
            <p class="card-subtitle text-danger"> Reunion semaine</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6">
    <div class="card border-start border-success">
      <div class="card-body">
        <div class="d-flex  align-items-center">
          <div>
            <span class="text-success display-6">
              <i class="ti ti-users"></i>
            </span>
          </div>
          <div class="ms-auto">
            <h4 class="card-title fs-7">{{ $totalMeetingsCount }}</h4>
            <p class="card-subtitle text-success">Total Réunion</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="col-lg-3 col-md-6">
    <div class="card border-start border-dark">
      <div class="card-body">
        <div class="d-flex  align-items-center">
          <div>
            <span class="text-dark display-6">
              <i class="ti ti-users"></i>
            </span>
          </div>
          {{-- <div class="ms-auto">
            <h4 class="card-title fs-7">1</h4>
            <p class="card-subtitle text-dark">Rapport</p>
          </div> --}}
        </div>
      </div>
    </div>
  </div> --}}






 
</div>

{{-- <div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Sample Page Darshboard</h5>
    <p class="mb-0">This is a sample page <a href="#" data-bs-toggle="tooltip" data-bs-title="Default tooltip">inline links</a> </p>
  </div>
</div> --}}



@endsection