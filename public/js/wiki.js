const selectedUpdateTagIds = [];
const selectedUpdateTagNames = [];

function handleTagSelection(selectElement) {
    const selectedTagsContainer = document.getElementById('selectedTagsContainer');
    const selectedTagIdsInput = document.getElementById('selectedTagIdsInput');

    // Check if an option is selected
    if (selectElement.selectedIndex !== -1) {
        const selectedTagName = selectElement.options[selectElement.selectedIndex].text;
        const selectedTagId = selectElement.value;

        if (selectedTagId && !document.getElementById(`selectedTag_${selectedTagId}`)) {
            // Add the selected tag to the container
            const tagDiv = document.createElement('div');
            tagDiv.id = `selectedTag_${selectedTagId}`;
            // console.log(tagDiv.id);

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
    }
}

function updateHiddenInput() {
    const selectedTagsContainer = document.getElementById('selectedTagsContainer');
    const selectedTagDivs = selectedTagsContainer.querySelectorAll('div');
    const selectedTagIds = Array.from(selectedTagDivs).map((div) => div.id.replace('selectedTag_', ''));
    selectedTagIdsInput.value = JSON.stringify(selectedTagIds);
}

////////////////////////////////////////////////////////////////////////
function updateSelectedTagsDisplay() {
    const selectedUpdateTagsContainer = document.getElementById('selectedUpdateTagsContainer');
    const updateHiddenUpdateInput = document.getElementById('updateHiddenUpdateInput');

    // Clear the container
    selectedUpdateTagsContainer.innerHTML = '';

  

    selectedUpdateTagNames.forEach((tagName, index) => {
        if (tagName !== null && tagName !== undefined) {
            const tagId = selectedUpdateTagIds[index];

            const tagDiv = document.createElement('div');
            tagDiv.id = `selectedUpdateTag_${tagId}`;
            console.log(tagDiv.id);

            tagDiv.className = 'flex items-center space-x-2 bg-blue-200 rounded-lg p-2 mb-2';

            const tagText = document.createElement('span');
            tagText.textContent = tagName;

            const removeIcon = document.createElement('i');
            removeIcon.className = 'bx bx-x cursor-pointer';

            removeIcon.addEventListener('click', function() {
                // Remove the tag directly within the updateSelectedTagsDisplay function
                tagDiv.remove();

                // Update the array by removing the tag ID
                const index = selectedUpdateTagIds.indexOf(tagId);
                if (index !== -1) {
                    selectedUpdateTagIds.splice(index, 1);
                    // Update the hidden input with the array of tag IDs
                    updateHiddenUpdateInput.value = JSON.stringify(selectedUpdateTagIds);
                    console.log(updateHiddenUpdateInput.value);
                }
            });

            tagDiv.appendChild(tagText);
            tagDiv.appendChild(removeIcon);

            selectedUpdateTagsContainer.appendChild(tagDiv);
        }
    });
    testupdateHiddenUpdateInput();

}



function handleUpdateTagSelection(selectElement) {
    const selectedUpdateTagsContainer = document.getElementById('selectedUpdateTagsContainer');

    // Check if an option is selected
    if (selectElement.selectedIndex !== -1) {
        const selectedTagName = selectElement.options[selectElement.selectedIndex].text;
        const selectedTagId = selectElement.value;

        if (selectedTagId && !document.getElementById(`selectedUpdateTag_${selectedTagId}`)) {
            // Add the selected tag to the container
            const tagDiv = document.createElement('div');
            tagDiv.id = `selectedUpdateTag_${selectedTagId}`;
            tagDiv.className = 'flex items-center space-x-2 bg-blue-200 rounded-lg p-2 mb-2';
            tagDiv.setAttribute('data-tag-id', selectedTagId); // Store tag ID as data attribute

            const tagText = document.createElement('span');
            tagText.textContent = selectedTagName; // Display the tag name instead of the tag ID

            const removeIcon = document.createElement('i');
            removeIcon.className = 'bx bx-x cursor-pointer';

            removeIcon.addEventListener('click', function() {
                handleTagRemoval(tagDiv);
            });

            tagDiv.appendChild(tagText);
            tagDiv.appendChild(removeIcon);

            selectedUpdateTagsContainer.appendChild(tagDiv);

            // Update the array here
            selectedUpdateTagIds.push(selectedTagId);
            testupdateHiddenUpdateInput();
        }

        selectElement.value = '';
    }
}

function handleTagRemoval(tagDiv) {
    const selectedUpdateTagsContainer = document.getElementById('selectedUpdateTagsContainer');
    const tagId = tagDiv.getAttribute('data-tag-id');

    selectedUpdateTagsContainer.removeChild(tagDiv);

    // Update the array by removing the tag ID
    const index = selectedUpdateTagIds.indexOf(tagId);
    if (index !== -1) {
        selectedUpdateTagIds.splice(index, 1);
        testupdateHiddenUpdateInput();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.editButton').forEach(button => {
        button.addEventListener('click', function() {
            showEditWikiForm(button);
        });
    });

    const tagSelectUpdate = document.getElementById('updateWikiTags');
    tagSelectUpdate.addEventListener('change', function() {
        handleUpdateTagSelection(tagSelectUpdate);
    });

    // Initialize selected tags display
    updateSelectedTagsDisplay();
});

function showEditWikiForm(button) {
    var editWikiForm = document.getElementById('authentication-modal');
    if (editWikiForm) {
        const wikiId = button.dataset.wikiId;
        const wikiTitle = button.dataset.wikiTitle;
        const wikiDescription = button.dataset.wikiDescription;
        const wikiCategory = button.dataset.wikiCategory;
        const wikiTags = JSON.parse(button.dataset.wikiTags);
        const TagsIds = JSON.parse(button.dataset.tagId);


        editWikiForm.querySelector('#editwikiId').value = wikiId;
        editWikiForm.querySelector('#updateWikiTitle').value = wikiTitle;
        editWikiForm.querySelector('#updateWikiDescription').value = wikiDescription;
        editWikiForm.querySelector('#updateWikiCategory').value = wikiCategory;

        // Clear existing array
        selectedUpdateTagIds.length = 0;
        selectedUpdateTagNames.length = 0;


        TagsIds.forEach((tagId, index) => {
            selectedUpdateTagIds.push(tagId);

            // Check if the corresponding tag name exists
            const tagName = wikiTags[index] || 'Unknown Tag';
            selectedUpdateTagNames.push(tagName);
        });

        console.log(selectedUpdateTagIds);

        updateSelectedTagsDisplay();
        testupdateHiddenUpdateInput();
    }
}

function testupdateHiddenUpdateInput() {
    const selectedUpdateTagsContainer = document.getElementById('selectedUpdateTagsContainer');
    const updateHiddenUpdateInput = document.getElementById('updateHiddenUpdateInput');
    if (updateHiddenUpdateInput) {
        updateHiddenUpdateInput.value = JSON.stringify(selectedUpdateTagIds);
        console.log(updateHiddenUpdateInput.value);
    }

}