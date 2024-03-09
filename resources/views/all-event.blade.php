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
            <nav class=" container mx-auto flex justify-between items-center">
                <a href="/" class="w-[10%]"><img src="img/logo.png" alt=""></a>
                <button id="burger-btn" class="block lg:hidden focus:outline-none">
                    <svg class="w-6 h-6 fill-current text-white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 4h16a1 1 0 010 2H2a1 1 0 010-2zm16 6H2a1 1 0 100 2h16a1 1 0 100-2zm0 6H2a1 1 0 100 2h16a1 1 0 100-2z" clip-rule="evenodd" />
                    </svg>
                </button>
                <ul class="lg:flex items-center hidden ">
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
                
                {{-- mobile menu --}}

                <ul id="mobil-menu" class="hidden lg:hidden items-center block absolute top-7 bg-gray-400 w-full">
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500 mt-7 ml-5">Home</a></li>
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500 mt-7 ml-5">About</a></li>
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500 mt-7 ml-5">Intro</a></li>
                    <li class="mr-6"><a href="#" class="font-bold text-blue-700 hover:text-blue-500 mt-7 ml-5">event</a></li>
                    <li class="mr-6"><a href="/" class="font-bold text-white hover:text-blue-500 mt-7 ml-5">Sponsors</a></li>
                    
                    <li class="mt-5 ml-5">

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}" class="nav-link inline-block px-4 py-2 border border-white rounded hover:bg-white hover:text-blue-600">
                            Log in
                        </a>                
                    
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

        <div class="container mx-auto mt-4 flex justify-between items-center ">
            <!-- Barre de recherche -->
            <div class="flex items-center">
                <input type="text" placeholder="Rechercher..." class="border border-gray-400 px-4 py-2 rounded-md mr-4">
                <button class="bg-[#00af83] text-white px-4 py-2 rounded-md hover:bg-[#3cb295]">Rechercher</button>
            </div>
        
            <!-- Dropdown -->
            <div class="">
               
                 
            <form class="flex justify-between w-full ">
               
              
                <select id="countries" class="rounded-md" >
                    <option value=""> choiser category</option>
                    @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <button
                class="flex items-center bg-[#00af83] text-white gap-1 px-4 py-2 cursor-pointer font-semibold tracking-widest rounded-md hover:bg-[#2a7461] duration-300 hover:gap-2 hover:translate-x-3"
              >
                filter
                <svg
                  class="w-5 h-5"
                  stroke="currentColor"
                  stroke-width="1.5"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                    stroke-linejoin="round"
                    stroke-linecap="round"
                  ></path>
                </svg>
              </button>
            </form>
  
    
           </div>
        </div>
        <!-- Header Area wrapper End -->

        {{-- _____________cards section start _____________ --}}


        @if (session('success'))
        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
            
            <div class="mx-auto container py-8">
                <div class="flex flex-wrap ">
                  @foreach($allAccepetedEvent as $accepetedEvent)
                    <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-8 mb-8 shadow-md rounded-xl">
                        <div>
                            <img alt="person capturing an image" src="{{asset('/storage/image/'.$accepetedEvent->image )}}" tabindex="0" class="focus:outline-none w-full h-44 rounded-md" />
                        </div>
                        <div class="bg-white">
                            <div class="flex items-center justify-between px-4 pt-4">
                                <div class="flex items-center">
                                    <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">{{$accepetedEvent->title}}</h2>
                                    
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
                                    <p tabindex="0" class="focus:outline-none text-xs text-yellow-700">{{$accepetedEvent->places_available}} places valaible</p>
                                </div>
                                <div class="flex ">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px"
                                    fill="#64748b">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z" />
                                </svg>
                                <p class="text-xs">Date d'evenement : {{$accepetedEvent->date}}</p>
                            </div>
                                <div class="text-grey-500 flex flex-row space-x-1 py-4 border-t border-b border-gray-200 my-4">
                                    <svg xmlns="http://www.w3.org/2000/svg"  class="h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                      </svg>
                                      <p class="text-xs">{{$accepetedEvent->location}} </p>
                                </div>
                               
                                <a href="{{route('event.detaille',['id'=>$accepetedEvent->id])}}" style="background-color: #00af83" class="ml-2 rounded-lg w-full py-2 px-20 mt-5 text-white font-bold">Show more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
       
                </div>
                
            </div>
            
        <script>
            // burger menu
        document.getElementById('burger-btn').addEventListener('click', function () {
                var menu = document.getElementById('mobil-menu');
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                } else {
                    menu.classList.add('hidden');
                }
            });     

             // Masquer le message de succès après 3 secondes
        setTimeout(function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 3000); // 3000 millisecondes = 3 secondes
    </script>
    </body>
</html>