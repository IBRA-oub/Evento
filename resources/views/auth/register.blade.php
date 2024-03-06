
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
            <form method="POST" action="{{ route('register') }} " enctype="multipart/form-data">
                @csrf
                <h1>Create Account</h1>
                {{-- ______ipload image_______ --}}
                <div class="flex items-center space-x-6">
                   
                   
                    <label class="block">
                        <img id="preview_img" class="preview-img" src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?size=338&ext=jpg&ga=GA1.1.1700460183.1708560000&semt=ais" alt="Current profile photo" />

                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" onchange="loadFile(event)" class="file-input"  name="picture_user"/>

                    </label>
                </div>
                {{-- _______fullName__________ --}}
                <label for="fullName" class="lab">fullName</label>
                <input id="name"  type="text" name="fullName" :value="old('name')" required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" style="color:red; font-size:12px; margin-top:2px;" />

                {{-- _________email__________ --}}
                <label for="email" class="lab">email</label>
                <input id="email"  type="email" name="email" :value="old('email')" required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" style="color:red; font-size:12px; margin-top:2px;" />

                {{-- ____________password________ --}}
                <label for="Password" class="lab">Password</label>
                <input  id="password" type="password" name="password" required autocomplete="new-password" >
                <x-input-error :messages="$errors->get('password')" style="color:red; font-size:12px; margin-top:2px;" />

                 <input  id="organisateur" type="hidden" name="role" value="organisateur" >

                    <a href="{{ route('login') }}">{{ __('Already registered?Login') }}</a>
                <button>{{ __('Register') }}</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <h1>Create Account</h1>
                {{-- ______ipload image_______ --}}
                <div class="flex items-center space-x-6">
                   
                   
                    <label class="block">
                        <img id="preview_img2" class="preview-img" src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?size=338&ext=jpg&ga=GA1.1.1700460183.1708560000&semt=ais" alt="Current profile photo" />

                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" onchange="loadFile2(event)" class=" file-input"  name="picture_user"/>

                    </label>
                </div>
                {{-- _______fullName__________ --}}
                <label for="fullName" class="lab">fullName</label>
                <input id="name"  type="text" name="fullName" :value="old('name')" required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" style="color:red; font-size:12px; margin-top:2px;" />

                {{-- _________email__________ --}}
                <label for="email" class="lab">email</label>
                <input id="email"  type="email" name="email" :value="old('email')" required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" style="color:red; font-size:12px; margin-top:2px;" />

                {{-- ____________password________ --}}
                <label for="Password" class="lab">Password</label>
                <input  id="password" type="password" name="password" required autocomplete="new-password" >
                <x-input-error :messages="$errors->get('password')" style="color:red; font-size:12px; margin-top:2px;" />

                 <input  id="organisateur" type="hidden" name="role" value="client" >

                    <a href="{{ route('login') }}">{{ __('Already registered?Login') }}</a>
                <button>{{ __('Register') }}</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Regester Comme Client</h1>
                    <button class="hidden" id="login">Sign up</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Regester Comme Organizateur!</h1>
                    
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

   <script>
    var loadFile = function(event) {
    var input = event.target;
    var file = input.files[0];
    var output = document.getElementById('preview_img');

    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src); // libérer la mémoire
    }
};

var loadFile2 = function(event) {
    var input = event.target;
    var file = input.files[0];
    var output = document.getElementById('preview_img2');

    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src); // libérer la mémoire
    }
};
   </script>
</body>

</html>



    

