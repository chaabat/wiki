<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <title>Wiki™</title>
</head>

<!-- component -->
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<body class="bg-gray-100">

    <div class="bg-white shadow-md">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between py-3">
            <!-- Logo -->
            <div class="flex items-center space-x-4 sm:space-x-10">
                <img src="" alt="">

                <!-- Search Bar -->
                <div class="relative">
                    <input type="text" placeholder="Search wikis..." class="border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring focus:border-blue-500 w-96">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <!-- SVG Search Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#c4c6ca" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex  mt-4 items-center space-x-4 md:flex-row">
                <!-- Login and Sign Up Buttons -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg">Login</button>
                <button class="bg-green-500 text-white px-4 py-2 rounded-lg">Sign Up</button>
            </div>
        </div>
    </div>


    <section class="flex flex-wrap mt-10 mx-auto md:px-12 flex-grow">

        <div class="container mx-auto px-4 md:px-12">
            <div class="flex justify-center bg-white rounded-xl p-2 w-40 mb-5 shadow-lg">

                <h2 class="text-lg font-bold">Wikis</h2>
            </div>
            <div class="flex flex-wrap -mx-1 lg:-mx-4">


                <!-- Create Project Card -->
                <div class="my-1 px-1 w-full md:h-60 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg">
                        <div class="group bg-gray-50   mt- py-16 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md ">
                            <a data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="bg-gray-200 text-yellow-700 group-hover:text-gray-800 group-hover:smooth-hover flex w-20 h-20 rounded-full items-center justify-center" href="./app/view/register.php">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </a>
                            <a class="text-gray-600 group-hover:text-gray-800 group-hover:smooth-hover text-center" href="register.php">
                                Create wiki </a>
                        </div>
                    </article>
                    <!-- END Article -->

                </div>
                <!-- END Column -->

                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                    <article class="overflow-hidden rounded-lg shadow-lg h-full
                        <?php
                        $bgColors = ['bg-blue-200', 'bg-gray-300', 'bg-gray-200', 'bg-gray-100', 'bg-blue-100'];
                        $randomIndex = array_rand($bgColors);
                        echo $bgColors[$randomIndex];
                        ?>
                                ">
                        <div class="flex flex-col justify-between py-4 px-6 h-48">
                            <h1 class="text-xl font-semibold mb-2">
                                <?php  ?>
                            </h1>
                            <p class="text-gray-700 mb-2">
                                <?php  ?>
                            </p>
                            <div class="flex justify-between mt-10">
                                <div class="flex flex-col justify-between text-sm text-gray-600">
                                    <div class="flex items-center">
                                        <img alt="User Avatar" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                        <p class="ml-2"><?php  ?></p>
                                    </div>

                                </div>
                                <div class="flex items-center gap-6">

                                    <a href="tasks.php?task&idpro=<?php  ?>" title="view details">
                                        <svg xmlns="http://www.w3.org/2000/svg" alt="title" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                            <path fill="#dfa401" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>






    </div>




    </div>
    </div>

    <script>

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
    </script>

</body>

</html>