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

function submitForm()
{
    document.getElementById('article-form').submit();
}

function changeImage()
{
    image = document.getElementById('image').value;
    document.getElementById('cover-preview').src = image;
}