<?php
require_once('../../controller/usercontroller.php');
require_once('../../controller/wikicontroller.php');

$user = new usercontroller();
$user->isLoggedIn('admin');
$user->login();
$user->logout();
$wiki = new wikiController();
$wikibycat = $wiki->WikisByCategory();
?>
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


<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<body>

    <div class="min-h-screen flex flex-col sm:flex-row bg-gray-100">

    <?php include ('../incFiles/sidebar.php');?>


      
        <div class="flex-grow p-4 bg-[#caf0f8]">


            <div class="px-6 py-8 max-w-4xl mx-auto">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-[#0466c8] rounded-3xl p-8 mb-5">
                        <h1 class="text-3xl font-bold mb-10 text-white">Welcome to your account, We are so happy to see you</h1>

                        <hr class="my-10 border border-white">
                        <div class="flex justify-center items-center">

                            <h2 class="text-2xl font-bold mb-4 text-white">Statistiques</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 mt-4">
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Number of wikis in each category

                                        </dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600"><?php echo $wikibycat;?></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Servers a month</dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">19.2K</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Servers a week</dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">4.9K</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total users</dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">166.7K</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total free servers</dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">1.6M</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Servers a month</dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">19.2K</dd>
                                    </dl>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>




    </div>

</body>

</html>