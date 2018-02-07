@extends('admin/default/template')

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
    
    {{-- hidden form to update contacts page --}}
    <form action="/admin/settings/updatecontactspage" method="POST" id="contacts-form">
        <textarea name="content" id="contacts-content">
            {!! $contact_page_content !!}
        </textarea>
    </form>
@endsection

@section('scripts')
    {!! Asset::js('tinymce/tinymce.min.js') !!}

    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount'
            ],
            toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | fullscreen',
        });

        function updateContact()
        {
            document.getElementById('contacts-form').submit();
        }
    </script>
@endsection