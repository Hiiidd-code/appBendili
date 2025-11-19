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
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">
<div id="react-root"></div>
    {{-- Navbar sederhana --}}
    <div>
        <div>
            <div class="">
                            <nav class="bg-white shadow">
                    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
                    <a href="{{ route('home') }}" class="font-bold text-lg flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="{{ asset("images/logo.webp") }}">
                        </a>

                        <div class="flex items-center gap-4">
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
                </nav>

            </div>
        </div>
    </div>

    <nav>
        <div id="sidebar-root">
        </div>
    </nav>




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
