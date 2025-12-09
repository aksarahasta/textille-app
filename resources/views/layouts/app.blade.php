<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Textille App') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    
        <script src="https://cdn.tailwindcss.com"></script>
        <script>    
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            textile: {
                                primary: '#4E342E',   /* Cokelat Tua */
                                secondary: '#5D4037', /* Cokelat Sedang */
                                light: '#D7CCC8',     /* Krem */
                                accent: '#8D6E63',    /* Aksen */
                            }
                        }
                    }
                }
            }
        </script>
        
        <style>
            /* Hack scrollbar */
            ::-webkit-scrollbar { width: 6px; }
            ::-webkit-scrollbar-track { background: #f1f1f1; }
            ::-webkit-scrollbar-thumb { background: #8D6E63; border-radius: 4px; }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        
        <div class="flex h-screen overflow-hidden">
            
            <aside class="w-64 flex-shrink-0 hidden md:flex flex-col bg-[#4E342E] text-white transition-all duration-300">
                
                <div class="h-20 flex items-center justify-center relative bg-[#3E2723] shadow-md">
                    <h1 class="text-3xl font-bold tracking-wider relative z-10 italic">Textille.</h1>
                </div>

                <a href="{{ route('profile.edit') }}" class="p-6 border-b border-[#5D4037] flex items-center space-x-3 bg-[#4E342E]">
                    <div  class="w-10 h-10 rounded-full bg-white text-[#4E342E] flex items-center justify-center font-bold text-xl shadow">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-white">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-300 uppercase tracking-wide">{{ Auth::user()->role }}</div>
                    </div>
                </a>

                <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                    
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-white text-[#4E342E] font-bold shadow-lg' : 'text-gray-300 hover:bg-[#5D4037] hover:text-white' }}">
                        <i class="fi fi-sr-home mr-3"></i><span> Dashboard </span>
                    </a>

                    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
                    <div class="pt-4 pb-1 px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Inventory</div>
                    
                    <a href="{{ route('materials.index') }}" class="flex items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('materials.*') ? 'bg-white text-[#4E342E] font-bold' : 'text-gray-300 hover:bg-[#5D4037] hover:text-white' }}">
                        <i class="fi fi-sr-box-check mr-3"></i><span> Bahan Baku </span>
                    </a>
                    
                    <a href="{{ route('transactions.index') }}" class="flex items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('transactions.*') ? 'bg-white text-[#4E342E] font-bold' : 'text-gray-300 hover:bg-[#5D4037] hover:text-white' }}">
                        <i class="fi fi-sr-box-open-full mr-3"></i><span> Gudang </span>
                    </a>
                    
                    <a href="{{ route('suppliers.index') }}" class="flex items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('suppliers.*') ? 'bg-white text-[#4E342E] font-bold' : 'text-gray-300 hover:bg-[#5D4037] hover:text-white' }}">
                       <i class="fi fi-sr-truck-side mr-3"></i></i><span> Supplier </span>
                    </a>
                    @endif

                    <div class="pt-4 pb-1 px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Produksi</div>
                    
                    <a href="{{ route('products.index') }}" class="flex items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('products.*') ? 'bg-white text-[#4E342E] font-bold' : 'text-gray-300 hover:bg-[#5D4037] hover:text-white' }}">
                        <i class="fi fi-sr-mockup mr-3"></i><span> Produk Jadi </span>
                    </a>

                    @if(Auth::user()->role != 'staff')
                    <a href="{{ route('production-reports.index') }}" class="flex items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('production-reports.*') ? 'bg-white text-[#4E342E] font-bold' : 'text-gray-300 hover:bg-[#5D4037] hover:text-white' }}">
                        <i class="fi fi-sr-document-signed mr-3"></i><span> Laporan Hasil </span>
                    </a>
                    @endif

                    @if(Auth::user()->role == 'manager' )
                    <a href="{{ route('schedules.index') }}" class="flex items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('schedules.*') ? 'bg-white text-[#4E342E] font-bold' : 'text-gray-300 hover:bg-[#5D4037] hover:text-white' }}">
                        <i class="fi fi-sr-calendar-clock mr-3"></i><span> Jadwal Produksi </span>
                    </a>
                    @endif

                    @if(Auth::user()->role == 'admin')
                        <div class="pt-4 pb-1 px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Admin Area</div>
                        
                        <a href="{{ route('users.index') }}" class="flex items-center px-4 py-2 rounded-lg transition-colors {{ request()->routeIs('users.*') ? 'bg-white text-[#4E342E] font-bold' : 'text-gray-300 hover:bg-[#5D4037] hover:text-white' }}">
                            <i class="fi fi-sr-users mr-3"></i><span> Kelola User </span>
                        </a>
                    @endif

                    <div class="pt-8 px-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-2 text-red-300 bg-[#3E2723] hover:bg-red-700 hover:text-white rounded-lg transition-colors shadow-inner">
                                <i class="fi fi-sr-exit mr-3"></i><span> Log Out </span>
                            </button>
                        </form>
                    </div>
                    
                </nav>
            </aside>

            <div class="flex-1 flex flex-col overflow-hidden bg-[#F5F5F5]">
                
                <header class="bg-white shadow-sm z-10 h-16 flex items-center justify-between px-6 border-b border-gray-200">
                    <button class="md:hidden text-gray-500 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <div class="relative w-full max-w-md ml-4 hidden md:block">
                        
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <div class="text-sm font-bold text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </header>

                <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 bg-[#F3F4F6]">
                    @if (isset($header))
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-[#4E342E]">
                                {{ $header }}
                            </h2>
                            <div class="w-16 h-1 bg-[#8D6E63] rounded mt-1"></div>
                        </div>
                    @endif

                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>