<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Website Kantor PT. United Tractors Bendili')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CDN (untuk development cepat) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    @viteReactRefresh
    @vite(['resources/js/app.jsx'])

</head>

<body>

    {{-- Navbar sederhana --}}
    <div class="container h-4 relative sticky top-0">
        <div class="h-auto w-screen">
            <nav class="bg-white shadow">
                <div class="py-1 px-3">
                    <div class="flex items-center justify-between">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset("images/logo.webp")}}" class="h-10 max-h-15">
                        </a>


                        <div class="flex items-center gap-4 px-5">
                            <a href="{{ route('home') }}" class="text-sm hover:text-blue-600">
                                Beranda
                            </a>

                            @auth
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}" class="text-sm hover:text-blue-600">
                                        Dashboard Admin
                                    </a>
                                @endif

                                <form action="{{ route('logout') }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-sm text-red-600 hover:underline">
                                        Logout
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-sm hover:text-blue-600">
                                    Login Admin
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div>
            <div id="sidebar-root" class="bg-sidebar-gray-600 h-full hoverflow-hidden"></div>
        </div>


    </div>

    {{--
    <div class="">
        <div class="off-screen">
            <ul>
                <li><a href="#">home</a></li>
                <li><a href="#">about</a></li>
                <li><a href="#">contact</a></li>
            </ul>
        </div>

        <nav class="PUSH">
            <div class="ham-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>


    <script src="./movingburgbar.js"></script> --}}




    {{-- Konten utama --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer sederhana --}}
    <footer class="bg-white border-t mt-8">
        <div class="max-w-6xl mx-auto px-4 py-4 text-xs text-gray-500 flex justify-between flex-wrap gap-2">
            <span>© {{ date('Y') }} PT. United Tractors Bendili. All Rights Reserved.</span>
            <span>Made with ♥ for internal office information system.</span>
        </div>
    </footer>

</body>

</html>