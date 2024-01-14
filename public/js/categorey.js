document.querySelectorAll('.editCategorieButton').forEach(button => {
    button.addEventListener('click', function() {
        showEditCategorieForm(button);
    });
});


function showEditCategorieForm(button) {
    var editCategorieForm = document.getElementById('authentication-modal');
    if (editCategorieForm) {
        editCategorieForm.querySelector('#editCategorieId').value = button.dataset.categorieId || '';
        editCategorieForm.querySelector('#editName').value = button.dataset.categorieName || '';

    }
}