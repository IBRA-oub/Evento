
<!DOCTYPE html>
<html lang="en">
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
            <meta name="csrf-token" content="{{ csrf_token() }}">
    
            <title>{{ config('app.name', 'Laravel') }}</title>
            
            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
            <!-- Scripts -->
            @vite(['resources/css/register.css', 'resources/js/app.js'])
        </head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
        </div>
        <div class="form-container sign-in">
            <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <h1>Log in</h1>
                
                {{-- _______email__________ --}}
                <label for="email" class="lab">Email</label>
                <input id="email"  type="email" name="email" :value="old('email')" required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('email')"  style="color:red; font-size:12px; margin-top:2px;" />


                {{-- ____________password________ --}}
                <label for="Password" class="lab">Password</label>
                <input  id="password"   type="password" name="password" required autocomplete="current-password" >
                <x-input-error :messages="$errors->get('password')"  style="color:red; font-size:12px; margin-top:2px;"/>

                
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"> {{ __('Forgot your password?') }}</a>
                    @endif
                <button>{{ __('Login') }}</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
               
                <div class="toggle-panel toggle-right">
                    <h1>WELCOME BACK!</h1>
                    <p>Découvrire nouvelle evenemment et reserver votre ticket</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



    

