<?php
require_once('../../controller/usercontroller.php');

$user = new usercontroller();
$err =$user->Register();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Wiki™</title>
</head>

<body >
    <section>

 

        <div class="min-h-screen bg-[#caf0f8] py-6 flex flex-col justify-center sm:py-12" id="signform">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div class="absolute inset-0 bg-gradient-to-l from-[#caf0f8] via-[#caf0f8] to-[#023e8a] shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                    <div class="max-w-md mx-auto">
                        <form action="" method="post" >
                            <?php if (!empty($err)) : ?>
                                <div class="text-xl font-semibold text-red-500">
                                    <?php echo $err; ?>
                                </div>
                            <?php endif; ?>
                            <div>
                                <h1 class="text-2xl font-semibold">Sign Up <br> Create your own Wikis </h1>
                            </div>

                            <div class="divide-y divide-[#023e8a]">
                                <div class="py-8 text-base leading-6 space-y-4 text-black-700 sm:text-lg sm:leading-7">
                                    <div class="relative">
                                        <input autocomplete="off" id="surname" name="nom" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-[#023e8a] text-black-900 focus:outline-none focus:borer-rose-600" placeholder="Enter your surname" required/>
                                        <span class="text-sm" type="text" name="" id="regsurname"></span>
                                        <label for="" class="absolute left-0 -top-3.5 text-black-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-black-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-black-600 peer-focus:text-sm">Enter your surname</label>
                                    </div>
                                    <div class="relative">
                                        <input autocomplete="off" id="username" name="prenom" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-[#023e8a] text-black-900 focus:outline-none focus:borer-rose-600" placeholder="Enter your username" required/>
                                        <span class="text-sm" type="text" name="" id="regusername"></span>

                                        <label for="" class="absolute left-0 -top-3.5 text-black-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-black-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-black-600 peer-focus:text-sm">Enter your username</label>
                                    </div>
                                    <div class="relative">
                                        <input autocomplete="off" id="email" name="email" type="email" class="peer placeholder-transparent h-10 w-full border-b-2 border-[#023e8a] text-black-900 focus:outline-none focus:borer-rose-600" placeholder="Email address" required/>
                                        <span class="text-sm" type="text" name="" id="regemail"></span>
                                        <label for="" class="absolute left-0 -top-3.5 text-black-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-black-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-black-600 peer-focus:text-sm">Email Address</label>
                                    </div>
                                    <div class="relative">
                                        <input autocomplete="off" id="tel" name="tel" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-[#023e8a] text-black-900 focus:outline-none focus:borer-rose-600" placeholder="Enter your phone number" required />
                                        <span class="text-sm" type="text" name="" id="regtel"></span>
                                        <label for="" class="absolute left-0 -top-3.5 text-black-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-black-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-black-600 peer-focus:text-sm">Enter your phone number</label>
                                    </div>
                                    <div class="relative">
                                        <input autocomplete="off" id="pass" name="pass" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-[#023e8a] text-black-900 focus:outline-none focus:borer-rose-600" placeholder="Password" required/>
                                        <span class="text-sm" type="text" id="rpassword"></span>
                                        <label for="" class="absolute left-0 -top-3.5 text-black-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-black-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-black-600 peer-focus:text-sm">Password</label>
                                    </div>
                                    <div class="relative">
                                        <button name="submit" type="submit" id="submitBtn" class="bg-[#023e8a] text-white rounded-md px-2 py-1">Create Account</button>
                                    <p class="text-sm font-light text-black-500 dark:text-black-400">
                                        already have an account? <a href="login.php" class="font-medium text-black-600  hover:underline">Login to your account </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


 <script src="../../../public/js/registre.js"></script>

</body>
</html> 
     