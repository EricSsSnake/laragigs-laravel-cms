<!DOCTYPE html>
<html lang="en" style="direction: {{ App::isLocale('fa') ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>LaraGigs | Find Laravel Jobs & Projects</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4" style="direction: ltr">
            <a href="/"
                ><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">

                @if (App::isLocale('en'))
                    <li>
                        <a href="{{ route(Route::currentRouteName(), 'fa') }}" class="hover:text-laravel">
                            FA
                        </a>
                    </li>
                @else
                    <li class="ml-6">
                        <a href="{{ route(Route::currentRouteName(), 'en') }}" class="hover:text-laravel">
                            EN
                        </a>
                    </li>
                @endif

                @auth  
                <li>
                    <span class="font-bold uppercase">
                     {{__('Welcome')}} {{auth()->user()->name}}
                    </span>
                </li>

                <li>
                    <a href="{{ route('manage', App::getLocale()) }}" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i> {{__('Manage Listings')}}
                    </a>
                </li>

                <li>
                    <form action="{{ route('logout', App::getLocale()) }}" method="post">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i> {{__('Logout')}}
                        </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="{{route('register', App::getLocale())}}" class="hover:text-laravel">
                        <i class="fa-solid fa-user-plus"></i> {{__('Register')}}
                    </a>
                </li>

                <li>
                    <a href="{{route('login', App::getLocale())}}" class="hover:text-laravel">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> {{__('Login')}}
                    </a>
                </li>
                @endauth
            </ul>
        </nav>

        <main>
            {{$slot}}
        </main>

        <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
    >
        <p class="ml-2">{{__('Copyright')}} &copy; {{date('Y')}} | {{__('All Rights reserved')}}</p>

        <a
            href="{{ route('listingsCreate', App::getLocale()) }}"
            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
            >{{__('Post Job')}}</a
        >
    </footer>
    <x-flash-message></x-flash-message>
</body>
</html>
