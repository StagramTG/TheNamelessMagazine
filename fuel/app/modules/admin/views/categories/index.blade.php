@extends('../default/template')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title">Catégories</h1>
        <p class="subtitle">Gestion des catégories</p>
    </div>

    <div class="column has-text-right">
        <a href="/admin/categories/edit" class="button is-success">Nouvelle catégorie</a>
    </div>
</div>

<table class="table is-bordered is-striped is-hoverable is-fullwidth">

    <thead>
    <tr>
        <th>Nom</th>
        <th>Date de création</th>
        <th colspan="2">Actions</th>
    </tr>
    </thead>

    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ date('d/m/Y à H:i', $category->created_at) }}</td>
            <td><a href="/admin/categories/edit?id={{ $category->id }}">modifier</a></td>
            <td><a href="javascript:void(0)" onclick="deleteCategory({{ $category->id }})">supprimer</a></td>
        </tr>
    @endforeach
    </tbody>

</table>

<div class="modal" id="delete-modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <section class="modal-card-body">
            <h1 class="title">Suppression de catégorie</h1>
            <p class="subtitle">
                La suppression d'une catégorie entraine également la suppression de tous les articles qui lui
                sont lié ! Etes-vous certain de vouloir supprimer cette catégorie ?
            </p>

            <form action="/admin/categories/delete" method="POST">
                <input type="text" hidden value="" id="category-id" name="id">
                <button type="submit" class="button is-danger">Supprimer</button>
                <button type="button" class="button is-link" onclick="toggleModal()">Annuler</button>
            </form>
        </section>
    </div>
</div>
@endsection

@section('scripts')
    {!! Asset::js('admin/categories/index.js') !!}
@endsection