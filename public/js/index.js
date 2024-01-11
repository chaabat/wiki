var wikisContent = document.getElementById('wikisContent').innerHTML;

function loadContent(category) {
    if (category === 'Wikis') {
        document.getElementById('wikisContent').style.display = 'flex';
        document.getElementById('categoriesContent').style.display = 'none';
        document.querySelector('.categoriesButton').classList.remove('bg-blue-400');
        document.querySelector('.wikisButton').classList.add('bg-blue-400');
    } else if (category === 'Categories') {
        document.getElementById('wikisContent').style.display = 'none';
        document.getElementById('categoriesContent').style.display = 'flex';
        document.querySelector('.wikisButton').classList.remove('bg-blue-400');
        document.querySelector('.categoriesButton').classList.add('bg-blue-400');
    }
}


document.querySelector('.categoriesButton').addEventListener('click', function() {
    loadContent('Categories');
});

document.querySelector('.wikisButton').addEventListener('click', function() {
    loadContent('Wikis');
});

loadContent('Wikis');

document.querySelectorAll('.editProjectButton').forEach(button => {
    button.addEventListener('click', function() {
        showEditProjectForm(button);
    });
});


function showEditProjectForm(button) {
    var editProjectForm = document.getElementById('authentication-modal');
    if (editProjectForm) {
        editProjectForm.querySelector('#editWikiId').value = button.dataset.projectId || '';
        editProjectForm.querySelector('#editName').value = button.dataset.projectName || '';
        editProjectForm.querySelector('#editdescription').value = button.dataset.projectDescription || '';

    }
}