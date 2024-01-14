document.querySelectorAll('.editTagButton').forEach(button => {
    button.addEventListener('click', function() {
        showEditTagForm(button);
    });
});


function showEditTagForm(button) {
    var editTagForm = document.getElementById('authentication-modal');
    if (editTagForm) {
        editTagForm.querySelector('#editTagId').value = button.dataset.tagId || '';
        editTagForm.querySelector('#editNameTag').value = button.dataset.tagName || '';

    }
}