@extends('include.model')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">informations</h6>
                <a class= "btn btn-primary" href="{{ route('maitre') }}">Retour</a>
            </div>
            <div>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="p-2 bd-highlight text-light">Nom:</div>
                    <div class="p-2 bd-highlight">{{ $maitre['nom'] }}</div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="p-2 bd-highlight">Prénoms:</div>
                    <div class="p-2 bd-highlight">{{ $maitre['prenoms'] }}</div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="p-2 bd-highlight">Téléphone:</div>
                    <div class="p-2 bd-highlight">{{ $maitre['telephone'] }}</div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="p-2 bd-highlight">Salaire:</div>
                    <div class="p-2 bd-highlight">{{ $maitre['salaire'] }} FCFA</div>
                </div>
            </div>
        </div>

        <div class="bg-secondary text-center rounded p-4 mt-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Parcours du maître</h6>
            </div>
            @foreach ($parcours as $parcour)
                <div>
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight text-light">Année scolaire:</div>
                        <div class="p-2 bd-highlight">{{ $parcour->anneeScolaire->annee_deb }}-{{ $parcour->anneeScolaire->annee_fin }}</div>
                    </div>
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight">Classe enseigné:</div>
                        <div class="p-2 bd-highlight">{{ $parcour->classe->libelle }}</div>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@endsection
