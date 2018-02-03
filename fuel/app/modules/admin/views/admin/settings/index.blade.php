@extends('admin/default/template')

@section('stylesheets')
    {!! Asset::css('quill/quill.snow.min.css') !!}
@endsection

@section('content')
    <h1 class="title">Paramètres</h1>
    <p class="subtitle">Paramètres généraux de l'application</p>
    <hr>

    <div class="columns">
        <div class="column">
            <p class="title is-5">Contenu de la page de contacts</p>
        </div>
        <div class="column has-text-right">
            <a href="javascript:void(0)" class="button is-link is-outlined" onclick="updateContact()">
                Enregistrer
            </a>
        </div>
    </div>
    <div id="contacts-editor">{!! $contact_page_content !!}</div>
    
    {{-- hidden form to update contacts page --}}
    <form action="/admin/settings/updatecontactspage" method="POST" id="contacts-form">
        <textarea name="content" id="contacts-content" hidden></textarea>
    </form>
@endsection

@section('scripts')
    {!! Asset::js('quill/quill.min.js') !!}

    <script>
        var quill = new Quill('#contacts-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                    [{ 'align': [] }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['blockquote', 'code-block'],

                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

                    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme

                    ['clean']                                         // remove formatting button
                ]
            }
        });

        function updateContact()
        {
            var form = document.getElementById('contacts-form');
            var textarea = document.getElementById('contacts-content');

            textarea.textContent = quill.container.firstChild.innerHTML;
            form.submit();
        }
    </script>
@endsection