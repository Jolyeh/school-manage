@extends('include.model')

@section('title', "Modifier les information de l'élève")

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">Modifier les information de l'élève</h6>
                        <a class= "btn btn-primary" href="{{ route('eleve') }}">Retour</a>
                    </div>
                    <form method="POST" action="{{ route('update-eleve', $eleve->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                                name="nom" value="{{ $eleve->nom }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Prénoms</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                                name="prenoms" value="{{ $eleve->prenoms }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="" aria-describedby="emailHelp"
                                name="date_naissance" value="{{ $eleve->date_naissance }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
