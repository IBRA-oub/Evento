
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
            @vite('public/style/client.css')

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
@if(auth()->user()->banned ==='0')
<body>
    
      <!-- Header Area wrapper Starts -->

      <header class="bg-gray-400 py-1">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="/" class="w-[10%]"><img src="img/logo.png" alt=""></a>
            <ul class="flex items-center">
                  
                    <li class="mr-6"><a href="/client-tickets" class="font-bold text-white hover:text-blue-500">Tickets</a></li>
                    <li class="mr-6"><a href="/client-reservation" class="font-bold text-blue-500">Reservation</a></li>
                   
               
                <li>   
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <button class="nav-link inline-block px-4 py-2 border border-white rounded hover:bg-white hover:text-blue-600">
                        Log out
                    </button>  
                    </form>              
                </li>
                
            </ul>
        </nav>
    </header>
    <!-- Header Area wrapper End -->

    {{-- _____________mes reservation_____________ --}}

    @if (session('success'))
        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        @if($clientReservation->isNotEmpty()) 
        @foreach($clientReservation as $reservation)
     
              <div class="  flex flex-col items-center justify-center "> 
               
              <div class=" mt-8  w-[80%] ">
             <div class="flex flex-col">
                 <div class="bg-white shadow-md  rounded-3xl p-4 ">
                     <div class="flex-none lg:flex">
                         <div class=" h-full w-full lg:h-48 lg:w-48   lg:mb-0 mb-3">
                             <img src="{{asset('storage/image/' . $reservation->event->image)}}"
                                 alt="Just a flower" class=" w-full  object-scale-down lg:object-cover  lg:h-48 rounded-2xl">
                         </div>
                         <div class="flex-auto ml-3 justify-evenly py-2">
                             <div class="flex flex-wrap ">
                                {{-- ___________titre____________ --}}
                                <h2 class="flex-auto text-lg font-medium">{{$reservation->event->title}}</h2>
                                {{-- _____________description_______________ --}}
                                 <div class="w-full flex-none text-xs text-blue-700 font-medium ">
                                    {{$reservation->event->description}}
                                 </div>
                               
                             </div>
                             <p class="mt-3"></p>
                             <div class="flex py-4  text-sm text-gray-500">
                                {{-- ___________location_____________ --}}
                                 <div class="flex-1 inline-flex items-center">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                         </path>
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                     </svg>
                                     <p class="">{{$reservation->event->location}}</p>
                                 </div>
                                 {{-- ___________date_____________ --}}
                                 <div class="flex-1 inline-flex items-center">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                     </svg>
                                     <p class="">{{$reservation->event->date}}</p>
                                 </div>
                                 {{-- ________________places____________ --}}
    
                                 <div class="flex-1 inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 9V6a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3"></path>
                                        <path d="M3 11v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-4 0v2H7v-2a2 2 0 0 0-4 0Z"></path>
                                        <path d="M5 18v2"></path>
                                        <path d="M19 18v2"></path>
                                      </svg>
                                    <p class="">N° {{$reservation->your_place}} </p>
                                </div>
    
                             </div>
                             <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                             <div class="flex space-x-3 text-sm font-medium">
                                 <div class="flex-auto flex space-x-3">
                                    
                                     {{-- ________________confirmation status__________ --}}
                                     @if($reservation->status === 'pending')
                                     <div
                                        class="mb-2 md:mb-0 bg-gray-200 px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full  inline-flex items-center space-x-2 ">
                                    
                                        <span>status: pending</span>
                                     </div>
                                     @elseif($reservation->status === 'accepted')
                                     <div
                                     class="mb-2 md:mb-0 bg-green-200 px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full  inline-flex items-center space-x-2 ">
                                 
                                     <span>status: accepted</span>
                                     </div>
                                     
                                    </div>
                                    @elseif($reservation->status === 'refused')
                                    <div
                                    class="mb-2 md:mb-0 bg-red-400 px-4 py-2 shadow-sm tracking-wider border text-white rounded-full  inline-flex items-center space-x-2 ">
                                
                                    <span>status: refused</span>
                                    </div>
                                    @endif
                                 </div>
                                
                                {{-- ___________________edit button_____________ --}}
                                @if($reservation->status === 'pending')
                                <form action="{{route('destroy.reservation',['id'=>$reservation->id , 'eventId'=>$reservation->event->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                 <button type="submit"
                                     class="mb-2 md:mb-0 bg-red-500 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800"
                                      aria-label="like">Cancel reservation
                                    </button>
                                </form>
                                @endif
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
            
         </div>
     </div>
    @endforeach
    @else
    <div class=" text-blue-600 font-bold text-sm md:text-5xl absolute  md:top-1/2 md:right-44 right-20 top-1/2">
       
         EMPTY  !! THER IS NO RESERVATION  
    </div>
    @endif

   
</body>
@else
<body class="bg-black flex justify-center items-center h-screen">
    <form method="POST" action="{{ route('logout') }}" class="absolute top-3 right-7">
        @csrf
    <button class="nav-link inline-block px-4 py-2 border bg-white text-black border-white rounded hover:bg-white hover:text-blue-600">
        Log out
    </button> 
    </form>
    <div class="loader">
        <div data-glitch="YOU ARE BANNED" class="glitch">YOU ARE BANNED</div>
     </div>
</body>
    @endif

</html>
