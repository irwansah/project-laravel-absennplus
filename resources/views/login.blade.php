<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        <!-- CDN develop onlu -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
            rel="stylesheet"
        />

        @vite('resources/css/app.css')
    </head>
    <body>
        <div
            id="splash-screen"
            class="fixed left-0 right-0 bottom-0 top-0 text-center bg-white flex items-center justify-center z-[999]"
        >
            <div
                class="transition-all translate-y-0 opacity-100 max-w-none duration-750 starting:opacity-0 starting:translate-y-6 flex flex-col justify-center items-center justify-items-center"
            >
                <img
                    src="{{ asset('/icons/logo.png') }}"
                    alt="Logo"
                    class="w-64"
                />
                <p class="text-sm text-gray-500">
                    copyright ©️ absennplus {{ date("Y") }}
                </p>
            </div>
        </div>

        <div id="main">
            <div
                class="flex min-h-full mt-36 flex-col justify-center px-6 py-12 lg:px-8"
            >
                <div
                    class="sm:mx-auto sm:w-full sm:max-w-sm flex justify-center"
                >
                    <img
                        src="{{ asset('/icons/logo.png') }}"
                        alt="Logo"
                        class="w-64"
                    />
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="#" method="GET">
                        <div>
                            <label
                                for="email"
                                class="block text-sm/6 font-medium text-gray-900"
                                >Email address</label
                            >
                            <div class="mt-2">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    autocomplete="email"
                                    required
                                    placeholder="masukan email"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm/6"
                                />
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label
                                    for="password"
                                    class="block text-sm/6 font-medium text-gray-900"
                                    >Password</label
                                >
                                <div class="text-sm">
                                    <a
                                        href="#"
                                        class="font-semibold text-red-600 hover:text-red-500"
                                        >Lupa password?</a
                                    >
                                </div>
                            </div>
                            <div class="mt-2">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    autocomplete="current-password"
                                    required
                                    placeholder="masukan password"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm/6"
                                />
                            </div>
                        </div>

                        <div>
                            <a
                                href="/home"
                                class="flex w-full justify-center rounded-full bg-red-600 px-3 py-2 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                            >
                                Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                setTimeout(() => {
                    const splash = document.getElementById("splash-screen");
                    const content = document.getElementById("main-content");
                    splash.classList.add("hidden");
                    content.classList.remove("opacity-0");
                }, 2000); // 2 detik
            });
        </script>
    </body>
</html>
