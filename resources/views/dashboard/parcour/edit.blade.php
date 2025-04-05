@extends('include.model')

@section('title', 'Modifier ce parcour')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">Modifier ce parcour</h6>
                        <a class= "btn btn-primary" href="{{ route('parcour') }}">Retour</a>
                    </div>
                    <form method="POST" action="{{ route('update-parcour', $parcour->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Eleve</label>
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="eleve_id">
                                <option disabled>Selectionnez l'élève</option>
                                @foreach ($eleves as $eleve)
                                    @if ($eleve->id == $parcour->eleve_id)
                                        <option selected value="{{ $eleve->id }}">{{ $eleve->nom }}
                                            {{ $eleve->prenoms }}</option>
                                    @else
                                        <option value="{{ $eleve->id }}">{{ $eleve->nom }} {{ $eleve->prenoms }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Classe</label>
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="classe_id">
                                <option disabled>Selectionnez la classe</option>
                                @foreach ($class as $classe)
                                    @if ($classe->id == $parcour->classe_id)
                                        <option selected value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                    @else
                                        <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Année scolaire</label>
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="annee_scolaire_id">
                                <option disabled>Selectionnez l'année scolaire</option>
                                @foreach ($anneeScolaires as $anneeScolaire)
                                    @if ($anneeScolaire->id == $parcour->annee_scolaire_id)
                                        <option selected value="{{ $anneeScolaire->id }}">
                                            {{ $anneeScolaire->annee_deb }}-{{ $anneeScolaire->annee_fin }}</option>
                                    @else
                                        <option value="{{ $anneeScolaire->id }}">
                                            {{ $anneeScolaire->annee_deb }}-{{ $anneeScolaire->annee_fin }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
