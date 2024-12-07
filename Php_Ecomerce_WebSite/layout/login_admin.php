<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet"/>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
		body{
			background-image: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
		}
		.carousel {
			display: flex;
			overflow: hidden;
		  }
		  
		  .slide {
			flex: 0 0 auto;
			width: 100%;
			transition: transform 0.5s ease-in-out;
		  }
		  
		  .hidden {
			display: none;
		  }		  
	</style>
    </head>
    <body>
	<div id="carousel" class="carousel flex flex-col justify-center items-center h-screen">
		<!-- Modal content login -->
		<div id="login" class="slide w-full max-w-md p-4 bg-white rounded-lg shadow-lg dark:bg-gray-700">
			<!-- login header -->
			<div class="flex items-center justify-between p-4 md:p-5 border-b dark:border-gray-600">
				<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
					Accés a votre compte
				</h3>
			</div>
			<!-- login body -->
			<div class="p-4 md:p-5">
				<form class="space-y-4" id="login_forme">
					<div>
						<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
						<input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="admin@gmail.com" required />
					</div>
					<div>
						<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre mot de pass</label>
						<input type="password" name="password" id="password" placeholder="admin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
					</div>
					<div class="flex justify-between items-center">
						<a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">J'ai oublier mon Mot de Pass?</a>
					</div>
					<input type="hidden" name="entrer" value="1">
					<button type="submit"  id="btn_log" name="btn_log" style="cursor:pointer" class="w-full text-white bg-blue-300  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" disabled>Connection</button>
					<div class="text-sm font-medium text-gray-500 dark:text-gray-300">
						Vous avez un Compte? <a id="signupBtn" href="#" class="text-blue-700 hover:underline dark:text-blue-500">Créer un nouveau compte</a>
					</div>
				</form>
			</div>
		</div>
		<!--  content Register -->
		<div id="signup" class="hidden slide w-full max-w-md p-4 bg-white rounded-lg shadow-lg dark:bg-gray-700">
			<!-- sign in  header -->
			<div class="flex items-center justify-between p-4 md:p-5 border-b dark:border-gray-600">
				<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
					Inscreption 
				</h3>
			</div>
			<!-- sign in  body -->
			<div class="p-4 md:p-5">
				<form class="max-w-sm mx-auto" id="sign_forme">
				    <div class="mb-5">
						<label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
						<input type="text" name="nom_admin" id="nom" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
					</div>
					<div class="mb-5">
						<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">votre email</label>
						<input type="email" name="gmail" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required />
					</div>
					<div class="mb-5">
						<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">votre mot de pass</label>
						<input type="password" name="pass" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
					</div>
					<div class="flex items-start mb-5">
						<div class="flex items-center h-5">
							<input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
						</div>
						<label for="terms" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">j'accepte tout <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms et conditions</a></label>
					</div>
					<button type="submit" name="btn_sign" class="mb-3 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Créer un nouveau compte</button>
					<input type="hidden" name="create" value="1" id="">
					<div class="text-sm font-medium text-gray-500 dark:text-gray-300">
						vous avez déja un Compte? <a href="#" id="loginBtn" class="text-blue-700 hover:underline dark:text-blue-500">Connectez-vous à votre profil</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="js/login_page.js"></script>
	<!--  swap betwen sign and log in -->
	
    </body>
</html>

