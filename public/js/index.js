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


        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.search-input');
            const searchResultsContainer = document.querySelector('.search-results');
            const originalCardsContainer = document.getElementById('wikisContent');

            searchInput.addEventListener('input', function() {
                const keyword = searchInput.value.trim();

                if (keyword === '') {
                    // If the search input is empty, display the original cards
                    originalCardsContainer.style.display = 'flex';
                    searchResultsContainer.innerHTML = '';
                } else {
                    // Send an AJAX request to the search_ajax.php file
                    fetch('./app/controller/wikiController.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'keyword=' + encodeURIComponent(keyword),
                        })
                        .then(response => response.json())
                        .then(data => {
                            originalCardsContainer.style.display = 'none';
                            displaySearchResults(data);
                        })
                        .catch(error => {
                            console.error('Error during AJAX request:', error);
                        });
                }
            });

            function displaySearchResults(results) {
                searchResultsContainer.innerHTML = '';
                if (results.length === 0) {
                    const noResultsMessage = document.createElement('p');
                    noResultsMessage.textContent = 'No results found.';
                    searchResultsContainer.appendChild(noResultsMessage);
                } else {
                    results.forEach(result => {
                        console.log(result);
                        const resultCard = createSearchResultCard(result);
                        searchResultsContainer.appendChild(resultCard);
                    });
                }
                //     results.forEach(result => {
                // console.log(result);

                //         const resultItem = createSearchResultCard(result);
                //         searchResultsContainer.appendChild(resultItem);
                //     });
            }

            function createSearchResultCard(result) {
                const cardContainer = document.createElement('div');
                cardContainer.className = 'my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3';

                const cardArticle = document.createElement('article');
                cardArticle.className = 'overflow-hidden rounded-lg shadow-lg h-full ' + getRandomBackgroundColor();

                const cardContent = document.createElement('div');
                cardContent.className = 'flex flex-col justify-between py-4 px-8 h-52';
                const formattedDate = new Date(result.creationDate).toLocaleString('en-US', {
                    day: 'numeric',
                    month: 'short',
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: false,
                });

                cardContent.innerHTML = `
                <p class="text-gray-700 mb-2">Categorie: ${result.nomCategorie}</p>
                <h1 class="text-xl font-semibold mb-2">TITLE: ${result.title}</h1>
                <div class="flex sm:rounded-lg p-1 gap-8 ml-2">
                    ${result.tagnames.split(',').map(tag => `
                        <div class="flex justify-center justify-center w-10 p-1">
                            <span class="inline-flex items-center font-medium rounded-lg text-sm px-4 py-1.5 text-center bg-blue-200 hover:bg-blue-400">
                                ${tag}
                            </span>
                        </div>
                    `).join('')}
                </div>
                <div class="flex justify-between">
                <div class="flex flex-col justify-between text-sm text-gray-600">
                        <div class="flex items-center">
                            <span class="inline-flex items-center justify-center h-8 w-8 text-lg text-gray-400"><i class="bx bx-user"></i></span>
                            <p class="ml-2">${result.nom}${result.prenom}</p>
                        </div>
                        <div class="flex items-center text-green-500 gap-2 mt-3">
                            <span class="ml- leading-none text-gray-600"></span>
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-1 leading-none">${formattedDate}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-6">
                        ${result.result ? `
                            <a title="Archive" href="index.php?archivewiki&wikiID=${result.wikiID}">
                                <svg class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                                </svg>
                            </a>
                        ` : ''}
                        <a href="./view/detailswiki.php?source=index&detailswiki&wikiID=${result.wikiID}" title="view details">
                            <svg xmlns="http://www.w3.org/2000/svg" alt="title" height="16" width="18" viewBox="0 0 576 512">
                                <path fill="#dfa401" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                            </svg>                            
                        </a>
                    </div>
                    </div>

            `;

                cardArticle.appendChild(cardContent);

                cardContainer.appendChild(cardArticle);

                return cardContainer;
            }

            function getRandomBackgroundColor() {
                const bgColors = ['bg-gray-300', 'bg-gray-200', 'bg-gray-100', 'bg-blue-100'];
                const randomIndex = Math.floor(Math.random() * bgColors.length);
                return bgColors[randomIndex];
            }
        });