var deleteModal;

(function ()
{
    deleteModal = document.getElementById('delete-modal');
})();

function toggleModal()
{
    deleteModal.classList.toggle('is-active');
}

function deleteArticle(articleID)
{
    if(deleteModal.classList.contains('is-active'))
    {
        toggleModal();
        return;
    }

    var idField = document.getElementById('article-id');
    idField.value = articleID;
    toggleModal();
}