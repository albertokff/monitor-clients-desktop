<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HGV - Monitor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen overflow-hidden">
        <aside :class="sidebarOpen ? 'w-64' : 'w-20'" class="bg-gray-900 text-white transition-all duration-300 flex flex-col">
            <div class="p-4 flex items-center justify-between border-b border-gray-800">
                <span x-show="sidebarOpen" class="font-bold text-xl tracking-wider">HGV</span>
                <button @click="sidebarOpen = !sidebarOpen" class="p-1 hover:bg-gray-800 rounded">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>

            <nav class="flex-1 mt-4">
                <a href="/" class="flex items-center p-4 hover:bg-gray-800 {{ request()->is('/') ? 'bg-blue-600' : '' }}">
                    <span class="mr-3">🏠</span>
                    <span x-show="sidebarOpen">Home</span>
                </a>

                <div x-data="{ open: {{ request()->is('clientes*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="w-full flex items-center p-4 hover:bg-gray-800 justify-between">
                        <div class="flex items-center">
                            <span class="mr-3">📄</span>
                            <span x-show="sidebarOpen">Cadastros</span>
                        </div>
                        <span x-show="sidebarOpen" :class="open ? 'rotate-180' : ''" class="transition-transform text-xs">⬇</span>
                    </button>
                    <div x-show="open && sidebarOpen" x-cloak class="bg-gray-800">
                        <a href="{{ route('clientes.index') }}" class="block p-3 pl-12 hover:text-blue-400">Clientes</a>
                    </div>
                </div>

                <a href="#" class="flex items-center p-4 hover:bg-gray-800">
                    <span class="mr-3">⚙</span>
                    <span x-show="sidebarOpen">Configurações</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 overflow-y-auto p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>