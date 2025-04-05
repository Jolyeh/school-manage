@extends('include.model')

@section('title', 'Ajouter une année scolaire')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-4">Modifier la classe</h6>
                        <a class= "btn btn-primary" href="{{ route('classe') }}">Retour</a>
                    </div>
                    <form method="POST" action="{{ route('update-classe', $classe->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Libellé</label>
                            <input type="text" class="form-control" id=""
                                aria-describedby="emailHelp" name="libelle" value="{{ $classe['libelle'] }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
