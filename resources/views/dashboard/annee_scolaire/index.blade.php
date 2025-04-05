@extends('include.model')

@section('title')
    Listes des années scolaire
@endsection

@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Listes des années scolaires</h6>
                <a class= "btn btn-primary" href="{{ route('add-annee-scolaire') }}">Ajouter une année scolaire</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">N°</th>
                            <th scope="col">Année début</th>
                            <th scope="col">Année fin</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nbr = 0;
                        @endphp
                        @foreach ($anneeScolaires as $anneeScolaire)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>{{ ++$nbr }}</td>
                                <td>{{ $anneeScolaire['annee_deb'] }}</td>
                                <td>{{ $anneeScolaire['annee_fin'] }}</td>
                                <td style="width: 25%">
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('show-annee-scolaire', $anneeScolaire['id']) }}">Détail</a>
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('edit-annee-scolaire', $anneeScolaire['id']) }}">Editer</a>
                                    <form class="btn btn-sm p-0 m-0" id="deleteForm-{{ $anneeScolaire->id }}"
                                        action="{{ route('delete-annee-scolaire') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $anneeScolaire->id }}">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            onclick="confirmDelete({{ $anneeScolaire->id }})">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(anneeScolaireId) {
        Swal.fire({
            title: "Êtes-vous sûr ?",
            text: "Cette action est irréversible !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EB1616",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Oui, supprimer !",
            cancelButtonText: "Annuler",
            background: "#191C24", // Définit l'arrière-plan en noir
            color: "#fff" // Définit le texte en blanc pour un bon contraste
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + anneeScolaireId).submit();
            }
        });

    }
</script>
