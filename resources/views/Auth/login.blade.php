<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Kumo Helpdesk
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
  .fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
   }
   .fade-enter, .fade-leave-to {
    opacity: 0;
   }
   .bg-custom-blue {
    background-color: #0674B3;
   }
   .text-custom-blue {
    color: #0674B3;
   }
   .border-custom-blue {
    border-color: #0674B3;
   }
   .focus\:ring-custom-blue:focus {
    --tw-ring-color: #0674B3;
   }
  </style>
 </head>
 <body class="bg-gray-100 flex items-center justify-center min-h-screen font-roboto relative overflow-hidden">
  <img alt="Futuristic background with neon lights and abstract geometric shapes" class="absolute inset-0 w-full h-full object-cover opacity-30" height="1080" src="https://storage.googleapis.com/a1aa/image/7CUpCkLg2L7VOxg1GV9v5Uq8D4S2PcPutbK3p97X93UweV7JA.jpg" width="1920"/>
  <div class="bg-custom-blue p-8 rounded-lg shadow-lg w-full max-w-2xl relative z-10">
  <div class="flex justify-center mb-4">
    <img alt="logo1.png" class="w-24 h-24" height="128" src="{{ asset('images/logo/logo1.png') }}" width="128"/>
   </div>
   <div id="app">
    <div class="fade-enter-active fade-leave-active" v-if="isLogin">
     <h2 class="text-2xl font-bold text-center mb-6">
      Login to Your Account
     </h2>
     <form>
      <div class="mb-4">
       <label class="block text-gray-700 font-medium mb-2" for="email">
        Email
       </label>
       <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" placeholder="Enter your email" type="email"/>
      </div>
      <div class="mb-6">
       <label class="block text-gray-700 font-medium mb-2" for="password">
        Password
       </label>
       <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" placeholder="Enter your password" type="password"/>
      </div>
      <div class="flex items-center justify-between mb-6">
       <div class="flex items-center">
        <input class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" id="remember" type="checkbox"/>
        <label class="ml-2 block text-gray-900" for="remember">
         Remember me
        </label>
       </div>
       <a class="text-white hover:underline" href="/forgot">
        Forgot password?
       </a>
      </div>
      <button class="w-full bg-white text-custom-blue py-2 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-custom-blue" type="submit">
       Login
      </button>
     </form>
     <div class="mt-6 text-center">
      <p class="text-white">
       Don't have an account? Please contact your administrator.
      </p>
     </div>
    </div>
    <div class="fade-enter-active fade-leave-active" v-else="">
     <h2 class="text-2xl font-bold text-center mb-6 text-white">
      Create an Admin Account
     </h2>
     <form>
      <div class="mb-4">
       <label class="block text-white font-medium mb-2" for="name">
        Name
       </label>
       <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-blue" id="name" placeholder="Enter your name" type="text"/>
      </div>
      <div class="mb-4">
       <label class="block text-white font-medium mb-2" for="email">
        Email
       </label>
       <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-blue" id="email" placeholder="Enter your email" type="email"/>
      </div>
      <div class="mb-6">
       <label class="block text-white font-medium mb-2" for="password">
        Password
       </label>
       <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-blue" id="password" placeholder="Enter your password" type="password"/>
      </div>
      <button class="w-full bg-white text-custom-blue py-2 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-custom-blue" type="submit">
       Sign Up
      </button>
     </form>
     <div class="mt-6 text-center">
      <p class="text-white">
       Already have an account?
       <a @click="toggleForm" class="text-white hover:underline cursor-pointer">
        Login
       </a>
      </p>
     </div>
    </div>
   </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js">
  </script>
  <script>
   new Vue({
    el: '#app',
    data: {
     isLogin: true
    },
    methods: {
     toggleForm() {
      this.isLogin = !this.isLogin;
     }
    }
   });
  </script>
 </body>
</html>