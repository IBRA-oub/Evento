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

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

      <!-- Header Area wrapper Starts -->

      <header class="bg-gray-400 py-1">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="/" class="w-[10%]"><img src="img/logo.png" alt=""></a>
            <ul class="flex items-center">
                  
                    <li class="mr-6"><a href="/client-tickets" class="font-bold text-white hover:text-blue-500">Tickets</a></li>
                    <li class="mr-6"><a href="/client-reservation" class="font-bold text-blue-500">Reservation</a></li>
                   
               
                <li>   
                    <a href="{{ route('login') }}" class="nav-link inline-block px-4 py-2 border border-white rounded hover:bg-white hover:text-blue-600">
                        Log out
                    </a>                
                </li>
                
            </ul>
        </nav>
    </header>
    <!-- Header Area wrapper End -->
</body>
</html>