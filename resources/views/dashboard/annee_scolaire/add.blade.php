@extends('include.model')

@section('title', 'Ajouter une année scolaire')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">Ajouter une année scolaire</h6>
                        <a class= "btn btn-primary" href="{{ route('annee-scolaire') }}">Retour</a>
                    </div>
                    <form method="POST" action="{{ route('store-annee-scolaire') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Année début</label>
                            <input type="number" min="1999" max="2025" class="form-control" id=""
                                aria-describedby="emailHelp" name="annee_deb">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Année fin</label>
                            <input type="number" min="1999" max="2020" class="form-control" id=""
                                aria-describedby="emailHelp" name="annee_fin">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
