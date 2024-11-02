<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Kumo Helpdesk</title>
</head>
<body class="font-varela">
<header>
	<!-- Navbar -->
	<nav>
		<div class="">
			<div class="flex justify-between bg-kumoBlue-100 h-16 px-10 shadow items-center">
    	    	<div class="flex items-center space-x-8">
    	      		<img src="image/logo/logo1.png" alt="Kumo Helpdesk" class="h-10 w-auto">
    	      		<!-- <div class="hidden md:flex justify-around space-x-4">
    	        		<a href="#" class="hover:text-indigo-600 text-gray-700">Home</a>
    	        		<a href="#" class="hover:text-indigo-600 text-gray-700">About</a>
    	        		<a href="#" class="hover:text-indigo-600 text-gray-700">Service</a>
    	        		<a href="#" class="hover:text-indigo-600 text-gray-700">Contact</a>
    	      		</div> -->
    			</div>
    	    	<div class="flex space-x-4 items-center">
    	    	  <!-- <a href="#" class="text-gray-800 text-sm">LOGIN</a> -->
				  <a href="mailto:#" class="text-kumoWhite-200 text-sm">Kontak Kami</a>
    	    	</div>
    	  	</div>
    	</div>
  	</nav>
  
  <!-- Login Form -->
  <div class="min-h-screen flex items-center justify-center w-full bg-kumoWhite-200">
	<div class="bg-white dark:bg-kumoBlue-100 shadow-md rounded-lg px-8 py-6 max-w-md">
		<!-- <h1 class="text-2xl font-bold text-center mb-4 dark:text-gray-200">Welcome Back!</h1> -->
		<img src="image/logo/logo1.png" alt="Kumo Helpdesk" class="mb-4">
		<form action="#">
			<div class="mb-4">
				<label for="email" class="block text-center text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Silahkan masukkan email & password Anda</label>
				<input type="email" id="email" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 bg-kumoWhite-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Email" required>
			</div>
			<div class="mb-4">
				<!-- <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label> -->
				<input type="password" id="password" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 bg-kumoWhite-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Password" required>	
				<dev class="flex justify-center mt-4">
					<a href="#"
						class="text-xs item text-kumoWhite-100 hover:text-kumoBlue-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Lupa Password?
					</a>
				</dev>
			</div>
			<!-- <div class="flex items-center justify-between mb-4">
				<div class="flex items-center">
					<input type="checkbox" id="remember" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 focus:outline-none" checked>
					<label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Remember me</label>
				</div>
			</div> -->
			<button onclick="alert("hello user")" type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-black bg-kumoWhite-100 hover:bg-kumoWhite-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black-100">Login</button>
		</form>
	</div>
</div>

</header>
</body>
</html>