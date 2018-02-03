@extends('admin/default/template')

@section('content')
    <h1 class="title">Catégorie</h1>
    <p class="subtitle">Edition d'une catégorie</p>

    @if(Session::get_flash('error_create', false, true))
        <div class="notification is-danger">
            Veuillez renseigner un nom pour la nouvelle catégorie.
        </div>
    @endif

    @if(Session::get_flash('error_update', false, true))
        <div class="notification is-danger">
            Le nom de la catégorie ne peut être vide !
        </div>
    @endif

    @if(Session::get_flash('success_create', false, true))
        <div class="notification is-success">
            Catégorie créée avec succès ! Vous pouvez maintenant en créer une autre.
        </div>
    @endif

    @if(Session::get_flash('success_update', false, true))
        <div class="notification is-success">
            Catégorie mise à jour avec succès !
        </div>
    @endif

    <form action="/admin/categories/edit" method="POST">

        <div class="field">
            <div class="control">
                <label for="">Nom de la catégorie</label>
                <input type="text" class="input" name="name" id="name" value="{{ $category != null ? $category->name: "" }}">
            </div>
        </div>

        @if($category != null)
            <input type="text" name="id" value="{{ $category->id }}" hidden>
        @endif

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Enregistrer</button>
            </div>
        </div>

    </form>
@endsection