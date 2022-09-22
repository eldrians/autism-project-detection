<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="w-full h-screen flex flex-col justify-center items-center">
        <div class="w-[700px] h-[500px]rounded-xl flex flex-col justify-center items-center">
            <div class="text-3xl font-bold text-slate-800 pt-5 pb-5">Register</div>
            <div class="border-2 p-7 bg-slate-300 border-slate-800 rounded-xl">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="flex flex-col">
                            <input id="name" type="text" class="w-[300px]  rounded p-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="text-red-500 font-thin text-xs" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="flex flex-col">
                            <input id="email" type="email" class="w-[300px]  rounded p-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="text-red-500 font-thin text-xs" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        <div class="flex flex-col">
                            <input id="password" type="password" class="w-[300px]  rounded p-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="text-red-500 font-thin text-xs" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                            Confirm Password
                        </label>
                        <div class="flex flex-col">
                            <input id="password-confirm" type="password" class="w-[300px]  rounded p-2" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="px-6 py-1 bg-slate-700 hover:bg-slate-800 rounded-full">
                            <button type="submit" class="font-semibold text-slate-50 hover:font-semibold text-lg">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
                    
               
        </div>
    </div>

</body>
<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>

</html>
