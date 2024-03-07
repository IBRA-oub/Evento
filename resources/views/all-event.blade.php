<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

           
            @vite('resources/css/app.css')

            <style>
                @import url('https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
                html {font-family: "PT Sans", sans-serif;}
                </style>
    </head>
    <body>

          <!-- Header Area wrapper Starts -->

          <header class="bg-gray-400 py-1">
            <nav class="container mx-auto flex justify-between items-center">
                <a href="/" class="w-[10%]"><img src="img/logo.png" alt=""></a>
                <ul class="flex items-center">
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500">Home</a></li>
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500">About</a></li>
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500">Intro</a></li>
                    <li class="mr-6"><a href="#" class="font-bold text-blue-700 hover:text-blue-500">event</a></li>
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500">Sponsors</a></li>
                    <li>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}" class="nav-link inline-block px-4 py-2 border border-white rounded hover:bg-white hover:text-blue-600">
                            Log in
                        </a>                
                    </li>
                     <li>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block px-4 py-2 ml-4 border border-blue-600 rounded bg-blue-600 text-white hover:bg-blue-700 hover:border-blue-700">
                                Register
                            </a>
                         @endif
                        @endauth
                     </li>
                      @endif
                </ul>
            </nav>
        </header>
        <!-- Header Area wrapper End -->

        {{-- _____________cards section start _____________ --}}


        
            <!-- Remove py-8 -->
            <div class="mx-auto container py-8">
                <div class="flex flex-wrap ">
                    <!-- Card 1 -->
                    <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-8 mb-8 shadow-md rounded-xl">
                        <div>
                            <img alt="person capturing an image" src="https://cdn.tuk.dev/assets/templates/classified/Bitmap (1).png" tabindex="0" class="focus:outline-none w-full h-44 rounded-md" />
                        </div>
                        <div class="bg-white">
                            <div class="flex items-center justify-between px-4 pt-4">
                                <div class="flex items-center">
                                    <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">Mawasin vive le mement</h2>
                                    
                                </div>
                               
                            </div>
                            <div class="p-4">
                                
                                <div class="bg-yellow-200 px-1 py-1.5  rounded-full flex mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3"></path>
                                        <path d="M3 11v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v2H7v-2a2 2 0 0 0-4 0Z"></path>
                                        <path d="M5 18v2"></path>
                                        <path d="M19 18v2"></path>
                                      </svg>
                                    <p tabindex="0" class="focus:outline-none text-xs text-yellow-700">100 places valaible</p>
                                </div>
                                <div class="flex ">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px"
                                    fill="#64748b">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z" />
                                </svg>
                                <p class="text-xs">Date d'evenement : 21-21-2000</p>
                            </div>
                                <div class="text-grey-500 flex flex-row space-x-1 py-4 border-t border-b border-gray-200 my-4">
                                    <svg xmlns="http://www.w3.org/2000/svg"  class="h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                      </svg>
                                      <p class="text-xs">Viale Stazione 36, 30171 </p>
                                </div>
                               
                                <a href="" style="background-color: #00af83" class="ml-2 rounded-lg w-full py-2 px-20 mt-5 text-white font-bold">Show more</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 1 Ends -->
       
                </div>
                
            </div>
            
        <script src="chrome-extension://kgejglhpjiefppelpmljglcjbhoiplfn/shadydom.js"></script>
        <script>
            if (!window.ShadyDOM) window.ShadyDOM = { force: true, noPatch: true };
        </script>
    </body>
</html>