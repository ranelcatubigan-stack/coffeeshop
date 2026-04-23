<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Brew & Bean | Coffee Shop</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,600;1,600&display=swap" rel="stylesheet">

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
            <style>
                :root {
                    --coffee-dark: #3d2b1f;
                    --coffee-medium: #6f4e37;
                    --coffee-light: #c0a080;
                    --cream: #f9f5f2;
                }
                body {
                    font-family: 'Inter', sans-serif;
                }
                h1, h2, .font-serif {
                    font-family: 'Playfair Display', serif;
                }
            </style>
        @endif
    </head>
    <body class="bg-[#f9f5f2] text-[#3d2b1f] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-5xl max-w-[335px] text-sm mb-6">
            <nav class="flex items-center justify-between gap-4">
                <div class="text-xl font-serif font-bold tracking-tight">☕ Brew & Bean</div>
                @if (Route::has('login'))
                    <div class="flex gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-5 py-1.5 border-[#3d2b1f] border rounded-full text-sm transition-all hover:bg-[#3d2b1f] hover:text-white">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-5 py-1.5 text-sm">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-5 py-1.5 bg-[#3d2b1f] text-white rounded-full text-sm shadow-md hover:bg-[#6f4e37] transition-all">Join Club</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>
        </header>

        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow">
            <main class="flex max-w-[335px] w-full flex-col lg:max-w-5xl lg:flex-row gap-8">
                
                <div class="flex-1 flex flex-col justify-center p-6 lg:p-12">
                    <h1 class="text-5xl lg:text-7xl mb-6 leading-tight">Freshly brewed <br><span class="italic text-[#6f4e37]">just for you.</span></h1>
                    <p class="mb-8 text-lg text-[#5a4638] leading-relaxed">Experience the finest organic beans sourced directly from sustainable farms. Your morning ritual, perfected.</p>
                    
                    <div class="flex gap-4">
                        <button class="bg-[#3d2b1f] text-white px-8 py-3 rounded-full font-medium shadow-lg hover:bg-[#2a1d15] transition-all">Order Now</button>
                        <button class="border border-[#3d2b1f] px-8 py-3 rounded-full font-medium hover:bg-white transition-all">View Menu</button>
                    </div>
                </div>

                <div class="flex-1 grid grid-cols-1 gap-4">
                    <div class="p-6 bg-white rounded-2xl shadow-sm border border-[#e3e3e0] hover:shadow-md transition-all">
                        <div class="w-10 h-10 bg-[#f4ece6] rounded-full flex items-center justify-center mb-4">🍂</div>
                        <h3 class="font-serif text-xl mb-1">Seasonal Blends</h3>
                        <p class="text-sm text-[#706f6c]">Discover our limited-time autumn roast with notes of nutmeg and maple.</p>
                    </div>

                    <div class="p-6 bg-white rounded-2xl shadow-sm border border-[#e3e3e0] hover:shadow-md transition-all">
                        <div class="w-10 h-10 bg-[#f4ece6] rounded-full flex items-center justify-center mb-4">🥐</div>
                        <h3 class="font-serif text-xl mb-1">Artisan Pastries</h3>
                        <p class="text-sm text-[#706f6c]">Baked fresh every morning in our local kitchen using traditional recipes.</p>
                    </div>
                </div>

            </main>
        </div>

        <footer class="mt-12 text-[#a1a09a] text-xs">
            &copy; {{ date('Y') }} Brew & Bean Coffee Roasters. Built with Laravel.
        </footer>
    </body>
</html>