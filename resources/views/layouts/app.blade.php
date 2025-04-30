<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <style>
            .fade-in {
                opacity: 0;
                transform: translateY(20px);
                animation: fadeInUp 0.6s ease forwards;
            }

            @keyframes fadeInUp {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .map-container iframe {
                border-radius: 12px;
            }

            .btn-dark {
                background-color: #333;
                border: none;
            }

            .btn-dark:hover {
                background-color: #000;
            }

            small {
                font-size: 13px;
            }


            .bottom-nav {
                position:fixed;
                bottom: 0;
                left:0;
                right:0;
                display: flex;
                justify-content: center;
                gap:20dvw;
                align-items: center;
                background: white;
                padding: 10px 0;
                border-top: 1px solid #eee;
            }

            .bottom-nav a {
                text-align: center;
                text-decoration: none;
                color: #bbb; /* default abu-abu */
                font-size: 12px;
                display: flex;
                align-items: center;
                flex-direction:column
            }

            .bottom-nav a.active {
                color: #000; /* aktif jadi hitam */
            }

            .bottom-nav i {
                font-size: 18px;
                display: block;
                margin-bottom: 2px;
            }

        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex justify-center px-4">
                {{ $slot }}
            </main>

            <nav class="bottom-nav">
                <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">
                    <div class="icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24"height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/>
                                <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        </svg>
                    </div>
                    <span>beranda</span>
                </a>

                <a href="{{ route('kehadiran') }}" class="{{ Request::is('kehadiran') ? 'active' : '' }}">
                    <div class="icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock4-icon lucide-clock-4">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                        </svg>
                    </div>
                    <span>kehadiran</span>
                </a>

                <a href="#" class="{{ Request::is('pemberitahuan') ? 'active' : '' }}">
                    <div class="icons">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-bell-icon lucide-bell">
                                <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                                <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/>
                        </svg>
                    </div>
                    <span>pemberitahuan</span>
                </a>
            </nav>
        </div>

        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
            });
        </script>
        @endif

        @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                html: '{!! implode("<br>", $errors->all()) !!}',
            });
        </script>
        @endif
    </body>
</html>
