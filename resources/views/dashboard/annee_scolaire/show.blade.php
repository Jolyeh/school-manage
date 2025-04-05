@extends('include.model')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">informations</h6>
                <a class= "btn btn-primary" href="{{ route('annee-scolaire') }}">Retour</a>
            </div>
            <div>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="p-2 bd-highlight text-light">Année début:</div>
                    <div class="p-2 bd-highlight">{{ $anneeScolaire['annee_deb'] }}</div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="p-2 bd-highlight">Année fin:</div>
                    <div class="p-2 bd-highlight">{{ $anneeScolaire['annee_fin'] }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
