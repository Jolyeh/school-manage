@extends('include.model')

@section('title', 'Ajouter un parcour')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">Ajouter un parcour</h6>
                        <a class= "btn btn-primary" href="{{ route('parcour') }}">Retour</a>
                    </div>
                    <form method="POST" action="{{ route('store-parcour') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Eleve</label>
                            <select class="form-select" id="floatingSelect"
                                aria-label="Floating label select example" name="eleve_id">
                                <option disabled selected>Selectionnez l'élève</option>
                                @foreach ($eleves as $eleve)
                                    <option value="{{ $eleve->id }}">{{ $eleve->nom }} {{ $eleve->prenoms }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Classe</label>
                            <select class="form-select" id="floatingSelect"
                                aria-label="Floating label select example" name="classe_id">
                                <option disabled selected>Selectionnez la classe</option>
                                @foreach ($class as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Année scolaire</label>
                            <select class="form-select" id="floatingSelect"
                                aria-label="Floating label select example" name="annee_scolaire_id">
                                <option disabled selected>Selectionnez l'année scolaire</option>
                                @foreach ($anneeScolaires as $anneeScolaire)
                                 <option value="{{ $anneeScolaire->id }}">{{ $anneeScolaire->annee_deb }}-{{ $anneeScolaire->annee_fin }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
