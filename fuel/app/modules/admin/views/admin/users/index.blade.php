@extends('admin/default/template')

@section('content')
    <div class="columns">
        <div class="column">
            <h1 class="title">Utilisateurs</h1>
            <p class="subtitle">Gestion des utilisateurs</p>
        </div>
        <div class="column has-text-right">
            <a href="/admin/users/create" class="button is-link is-outlined">Ajouter un utilisateur</a>
        </div>
    </div>

    <table class="table is-bordered is-striped is-hoverable is-fullwidth">

        <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse mail</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $i => $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="javascript:void(0)" onclick="deleteUser({{ $user->id }})">supprimer</a></td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="modal" id="delete-modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <section class="modal-card-body">
                <h1 class="title">Suppression de l'utilisateur</h1>
                <p class="subtitle">
                    La suppression d'un utilisateur est définitive et irréversible !
                </p>

                <form action="/admin/users/delete" method="POST">
                    <input type="text" hidden value="" id="user-id" name="id">
                    <button type="submit" class="button is-danger">Supprimer</button>
                    <button type="button" class="button is-link" onclick="toggleModal()">Annuler</button>
                </form>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var deleteModal;

        (function ()
        {
            deleteModal = document.getElementById('delete-modal');
        })();

        function toggleModal()
        {
            deleteModal.classList.toggle('is-active');
        }

        function deleteUser(id)
        {
            if(deleteModal.classList.contains('is-active'))
            {
                toggleModal();
                return;
            }

            var idField = document.getElementById('user-id');
            idField.value = id;
            toggleModal();
        }
    </script>
@endsection