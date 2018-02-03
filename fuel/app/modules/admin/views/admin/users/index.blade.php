@extends('admin/default/template')

@section('content')
    <h1 class="title">Utilisateurs</h1>
    <p class="subtitle">Gestion des utilisateurs</p>

    <table class="table is-bordered is-striped is-hoverable is-fullwidth">

        <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse mail</th>
            <th colspan="2">Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $i => $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="#">modifier</a></td>
                <td><a href="#">supprimer</a></td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection