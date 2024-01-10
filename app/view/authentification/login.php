<?php
require_once('../../controller/usercontroller.php');

$user = new usercontroller();
$m = $user->login();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
	<title>Wiki™</title>
</head>

<body class="bg-[#caf0f8]">

<!-- Example -->
<div class="flex min-h-screen">

  <!-- Container -->
  <div class="flex flex-row w-full">

	<!-- Sidebar -->
	<div class='hidden lg:flex flex-col justify-between bg-[#023e8a] lg:p-8 xl:p-12 lg:max-w-sm xl:max-w-lg'>
	  <div class="flex items-center justify-start space-x-3">
		<span class="bg-black rounded-full w-8 h-8"></span>
		<a href="#" class="font-medium text-xl">Brand</a>
	  </div>
	  <div class='space-y-5'>
		<h1 class="lg:text-3xl xl:text-5xl xl:leading-snug font-extrabold text-white">Enter your account and create new
		  Wikis</h1>
		<p class="text-lg">You do not have an account?</p>
		<a href="./register.php"
		  class="inline-block flex-none px-4 py-3 border-2 rounded-lg font-medium border-black bg-[#caf0f8] text-black">Create
		  account here</a>
	  </div>
	  <p class="font-medium">© 2024 Wiki</p>
	</div>

	<!-- Login -->
	<div class="flex flex-1 flex-col items-center justify-center px-10 relative">
	  <div class="flex lg:hidden justify-between items-center w-full py-4">
		<div class="flex items-center justify-start space-x-3">
		  <span class="bg-black rounded-full w-6 h-6"></span>
		  <a href="#" class="font-medium text-lg">Brand</a>
		</div>
		<div class="flex items-center space-x-2">
		  <span>Not a member? </span>
		  <a href="#" class="underline font-medium text-[#070eff]">
			Sign up now
		  </a>
		</div>
	  </div>
	  <!-- Login box -->
	  <form action="" method="post">
					  
	  <div class="flex flex-1 flex-col  justify-center space-y-5 max-w-md">
		<div class="flex flex-col space-y-2 text-center">
		  <h2 class="text-3xl md:text-4xl font-bold mb-8">Sign In To Your Account</h2>
		  
		</div>
		<div class="flex flex-col max-w-md space-y-5">
		<label for="email" class="   text-black text-m peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email Address</label>

		  <input type="text" name="email" id="email" 
			class="flex px-3 py-2 md:px-4 md:py-3 border-2 border-black rounded-lg font-medium placeholder:font-normal" />
			</div>
			<div class="flex flex-col max-w-md space-y-5">
			<label for="password" class="   text-black text-m peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>

		  <input type="password" name="pass" id="pass" 
			class="flex px-3 py-2 md:px-4 md:py-3 border-2 border-black rounded-lg font-medium placeholder:font-normal" />
			</div>
		  <button type="submit" name="submit" id="submit" class="flex items-center justify-center flex-none px-3 py-2 md:px-4 md:py-3 border-2 rounded-lg font-medium border-black bg-[#023e8a] text-white">
			login</button>
			
			</div> 
			<?php if (!empty($m)) : ?>
							  <div class="text-xl font-semibold text-red-500">
								  <?php echo $m; ?>
							  </div>
						  <?php endif; ?>
					  </from>

</body>

</html>