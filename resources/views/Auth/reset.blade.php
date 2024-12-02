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
    <img alt="Company logo with a modern design featuring abstract shapes and vibrant colors" class="w-32 h-32" height="128" src="{{ asset('images/logo/logo1.png') }}" width="128"/>
   </div>
   <div id="app">
    <div class="fade-enter-active fade-leave-active" v-if="isForgotPassword">
     <h2 class="text-2xl font-bold text-center mb-6 text-white">
      Reset Your Password
     </h2>
     <form>
      <div class="mb-4">
       <label class="block text-white font-medium mb-2" for="email">
        Email
       </label>
       <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-blue" id="email" placeholder="Enter your email" type="email"/>
      </div>
      <button class="w-full bg-white text-custom-blue py-2 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-custom-blue" type="submit">
       Send Reset Link
      </button>
     </form>
     <div class="mt-6 text-center">
      <p class="text-white">
       Remembered your password?
       <a class="text-white hover:underline cursor-pointer" href="#">
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
     isForgotPassword: true
    },
    methods: {
     toggleForgotPassword() {
      this.isForgotPassword = !this.isForgotPassword;
     }
    }
   });
  </script>
 </body>
</html>