@extends('include.model')

@section('title', 'Ajouter un maitre')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">Modifier les informations</h6>
                        <a class= "btn btn-primary" href="{{ route('maitre') }}">Retour</a>
                    </div>
                    <form method="POST" action="{{ route('update-maitre', $maitre['id']) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                                name="nom" value="{{ $maitre->nom }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Prénoms</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                                name="prenoms" value="{{ $maitre->prenoms }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Téléphone</label>
                            <input type="number" class="form-control" id="" aria-describedby="emailHelp"
                                name="telephone" value="{{ $maitre->telephone }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Salaire</label>
                            <input type="number" class="form-control" id="" aria-describedby="emailHelp"
                                name="salaire" value="{{ $maitre->salaire }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
