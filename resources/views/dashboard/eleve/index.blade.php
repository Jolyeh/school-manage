@extends('include.model')

@section('title')
    Listes des élèves
@endsection

@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Listes des élèves</h6>
                <a class= "btn btn-primary" href="{{ route('add-eleve') }}">Ajouter un élève</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">N°</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénoms</th>
                            <th scope="col">Date de naissance</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nbr = 0;
                        @endphp
                        @foreach ($eleves as $eleve)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>{{ ++$nbr }}</td>
                                <td>{{ $eleve['nom'] }}</td>
                                <td>{{ $eleve['prenoms'] }}</td>
                                <td>{{ $eleve->date_naissance }}</td>
                                <td style="width: 25%">
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('show-eleve', $eleve['id']) }}">Détail</a>
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('edit-eleve', $eleve->id) }}">Editer</a>
                                    <form class="btn btn-sm p-0 m-0" id="deleteForm-{{ $eleve->id }}"
                                        action="{{ route('delete-eleve') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $eleve->id }}">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            onclick="confirmDelete({{ $eleve->id }})">
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
    function confirmDelete(eleveId) {
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
                document.getElementById('deleteForm-' + eleveId).submit();
            }
        });

    }
</script>
