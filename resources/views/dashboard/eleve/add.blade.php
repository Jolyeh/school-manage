@extends('include.model')

@section('title', 'Ajouter un élève')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">Ajouter un élève</h6>
                        <a class= "btn btn-primary" href="{{ route('eleve') }}">Retour</a>
                    </div>
                    <form method="POST" action="{{ route('store-eleve') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                                name="nom">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Prénoms</label>
                            <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                                name="prenoms">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="" aria-describedby="emailHelp"
                                name="date_naissance">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
