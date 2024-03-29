<body class="bg-blue-500">
    <nav class="relative px-4 py-4 flex justify-between items-center bg-[#0466c8] h-[80px]">
        <a class="text-3xl font-bold leading-none" href="#">
            <img class="h-[80px]" src="./public/img/z.png" alt="">
        </a>
        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-blue-600 p-3">
                <svg class="block h-6 w-6 fill-current bg-white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
      
        <div class="flex items-center mx-auto lg:w-96">
            <input type="text" class="search-input lg:w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none focus:ring focus:border-blue-500" placeholder="Search wikis...">
            <div class="lg:ml-8 lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-3">
                <?php
                if (!$result && !$result2) {
                    // Display "Sign In" and "Sign Up" only if the user is not an author or admin
                    echo '<a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200" href="./app/view/authentification/login.php">Sign In</a>';
                    echo '<a class="hidden lg:inline-block py-2 px-6 bg-[#caf0f8]  text-sm text-black font-bold rounded-xl transition duration-200" href="./app/view/authentification/register.php">Sign up</a>';
                } elseif ($result) {
                    
                    echo '<a href="./app/view/admin/dashboard.php" class="text-black bg-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Dashboard</a>';
                } elseif ($result2) {
                   
                    echo '<a href="./app/view/author/wikis.php" class="text-black bg-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Your Wikis</a>';
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
          
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="#">
                    <img class="h-[100px]" src="./public/img/wiki.png" alt="">
                </a>
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="mt-auto">
                <div class="pt-6">
                    <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl"  href="./app/view/authentificatio">Sign in</a>
                    <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl" href="./app/view/authentification/registre.php">Sign Up</a>
                </div>

                <p class="my-4 text-xs text-center text-gray-400">
                    <span>Copyright © 2021</span>
                </p>
            </div>
        </nav>
    </div>
</body>


<script src="./public/js/burgerMenu.js">

</script>

