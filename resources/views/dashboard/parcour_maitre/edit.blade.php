@extends('include.model')

@section('title', 'Ajouter un parcour')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">Modifier ce parcour</h6>
                        <a class= "btn btn-primary" href="{{ route('parcour-maitre') }}">Retour</a>
                    </div>
                    <form method="POST" action="{{ route('update-parcour-maitre', $parcourMaitre->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Maître</label>
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="maitre_id">
                                <option disabled>Selectionnez le maître</option>
                                @foreach ($maitres as $maitre)
                                    @if ($maitre->id == $parcourMaitre->maitre_id)
                                        <option selected value="{{ $maitre->id }}">{{ $maitre->nom }}
                                            {{ $maitre->prenoms }}</option>
                                    @else
                                        <option value="{{ $maitre->id }}">{{ $maitre->nom }} {{ $maitre->prenoms }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Classe</label>
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="classe_id">
                                <option disabled >Selectionnez la classe</option>
                                @foreach ($class as $classe)
                                    @if ($classe->id == $parcourMaitre->classe_id)
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
                                <option disabled >Selectionnez l'année scolaire</option>
                                @foreach ($anneeScolaires as $anneeScolaire)
                                    @if ($anneeScolaire->id == $parcourMaitre->annee_scolaire_id)
                                        <option selected value="{{ $anneeScolaire->id }}"> {{ $anneeScolaire->annee_deb }}-{{ $anneeScolaire->annee_fin }}</option>
                                    @else
                                        <option value="{{ $anneeScolaire->id }}"> {{ $anneeScolaire->annee_deb }}-{{ $anneeScolaire->annee_fin }}</option>
                                    @endif<option value="{{ $anneeScolaire->id }}"> {{ $anneeScolaire->annee_deb }}-{{ $anneeScolaire->annee_fin }}</option>
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
