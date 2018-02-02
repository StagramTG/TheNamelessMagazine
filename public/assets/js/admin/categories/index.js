var deleteModal;

(function ()
{
    deleteModal = document.getElementById('delete-modal');
})();

function toggleModal()
{
    deleteModal.classList.toggle('is-active');
}

function deleteCategory(categoryID)
{
    if(deleteModal.classList.contains('is-active'))
    {
        toggleModal();
        return;
    }

    var idField = document.getElementById('category-id');
    idField.value = categoryID;
    toggleModal();
}