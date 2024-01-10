function handleTagSelection(selectElement) {
    const selectedTagsContainer = document.getElementById('selectedTagsContainer');
    const selectedTagIdsInput = document.getElementById('selectedTagIdsInput');

    const selectedTagId = selectElement.value;
    const selectedTagName = selectElement.options[selectElement.selectedIndex].text;

    if (selectedTagId && !document.getElementById(`selectedTag_${selectedTagId}`)) {
        // Add the selected tag to the container
        const tagDiv = document.createElement('div');
        tagDiv.id = `selectedTag_${selectedTagId}`;
        tagDiv.className = 'flex items-center space-x-2 bg-blue-200 rounded-lg p-2 mb-2';

        const tagText = document.createElement('span');
        tagText.textContent = selectedTagName;

        const removeIcon = document.createElement('i');
        removeIcon.className = 'bx bx-x cursor-pointer';


        removeIcon.addEventListener('click', function() {
            selectedTagsContainer.removeChild(tagDiv);
            updateHiddenInput();
        });

        tagDiv.appendChild(tagText);
        tagDiv.appendChild(removeIcon);

        selectedTagsContainer.appendChild(tagDiv);
        updateHiddenInput();
    }


    selectElement.value = '';

    function updateHiddenInput() {

        const selectedTagDivs = selectedTagsContainer.querySelectorAll('div');
        const selectedTagIds = Array.from(selectedTagDivs).map((div) => div.id.replace('selectedTag_', ''));
        selectedTagIdsInput.value = JSON.stringify(selectedTagIds);
    }
}