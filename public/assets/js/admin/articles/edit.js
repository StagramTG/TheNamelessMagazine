var quill = new Quill('#editor', {
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
            ['image', 'video'],

            ['clean']                                         // remove formatting button
        ]
    }
});

function changeImage()
{
    image = document.getElementById('image').value;
    document.getElementById('cover-preview').src = image;
}

function submitForm()
{
    // Get editor content
    var contentString = quill.container.firstChild.innerHTML;

    // Get hidden text area and fill it
    var content = document.getElementById('content');
    content.textContent = contentString;

    // Check other needed fields
    var title = document.getElementById('title');
    var category = document.getElementById('category');
    var image = document.getElementById('image');

    if(title.value === "")
    {
        alert("Donnez un titre à l'article !");
        return;
    }
    if(category.value === "0")
    {
        alert("Donnez une catégorie à l'article !");
        return;
    }
    if(image.value === "0")
    {
        alert("Donnez une image de couverture à l'article !");
        return;
    }

    // submit form
    document.getElementById('article-form').submit();
}