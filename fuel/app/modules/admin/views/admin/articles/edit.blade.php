@extends('admin/default/template')

@section('content')
    <div class="columns">
        <div class="column">
            <h1 class="title">Articles</h1>
            <p class="subtitle">Edition d'un article</p>
        </div>

        <div class="column has-text-right">
            <a href="javascript:void(0)" onclick="submitForm()" class="button is-link">Enregistrer</a>
        </div>
    </div>

    <div class="section has-text-centered">
        <img src="{{ $article != null ? $article->image: "" }}" id="cover-preview">
    </div>

    <form action="/admin/articles/edit" method="POST" id="article-form">

        <div class="field">
            <p class="control">
                <label for="title" class="label">Titre de l'article</label>
                <input class="input" type="text" name="title" id="title" value="{{ $article != null ? $article->title: "" }}">
            </p>
        </div>

        <div class="field">
            <p class="control">
                <label for="image" class="label">Image de couverture de l'article</label>
                <input class="input" type="text" name="image" id="image" value="{{ $article != null ? $article->image: "" }}" onchange="changeImage()">
            </p>
        </div>

        <div class="columns">
            <div class="column">
                <div class="field">
                    <div class="control">
                        <div class="select">
                            <select name="category" id="category">
                                <option value="0" disabled>Veuillez sélectionner une catégorie</option>
                                @foreach($categories as $i => $category)
                                    <option value="{{ $category->id }}" {{  $article != null ? ($article->category_id == $category->id ? "selected": ""): "" }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="field">
                    <p class="control has-text-right">
                        <label for="draft" class="checkbox">
                            <input class="checkbox" type="checkbox" name="draft" id="draft" value="draft" {{  $article != null ? ($article->draft == 1 ? "checked": ""): ""}}>
                            Mode brouillon <small>(Article non publié sur le site)</small>
                        </label>
                    </p>
                </div>
            </div>
        </div>

        <div class="field">
            <p class="control">
                <textarea name="content" id="content">
                    {!! $article != null ? $article->content: "" !!}
                </textarea>
            </p>
        </div>

        <!-- Hidden input for article id -->
        @if($article != null)
            <input type="text" name="id" value="{{ $article->id }}" hidden>
        @endif

    </form>
@endsection

@section('scripts')
    {!! Asset::js('tinymce/tinymce.min.js') !!}
    {!! Asset::js('admin/articles/edit.js') !!}
@endsection