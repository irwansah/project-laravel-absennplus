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
                class="topbar top-0 shadow bg-white relative md:sticky w-full md:shadow-lg z-[99]"
            >
                <div
                    class="container w-full flex justify-between items-center p-4 md:max-w-[60%] md:mx-auto"
                >
                    <div onclick="location.href='./home'">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-arrow-left-icon lucide-arrow-left"
                        >
                            <path d="m12 19-7-7 7-7" />
                            <path d="M19 12H5" />
                        </svg>
                    </div>
                    <div class="text-center w-full">Kehadiran</div>
                </div>
            </div>

            <div
                id="content"
                class="relative container-fluid md:max-w-[60%] md:mx-auto md:border border-[#ddd] min-h-[100dvh] p-4 md:-mt-1"
            >
                <h2 class="text-xl font-bold">Checkin/Checkout</h2>
                <div class="rounded-2xl border border-gray-400 min-h-[50dvh] mt-5">

                </div>
            </div>

            <div
                class="navbar fixed bottom-0 w-full md:shadow-lg z-[99] bg-white border-t-2 border-gray-300"
            >
                <div
                    class="container w-full flex justify-around md:justify-center md:space-x-36 items-center p-4 md:max-w-[60%] md:mx-auto"
                >
                    <div
                        class="flex flex-col justify-center items-center hover:text-gray-400 cursor-pointer"
                    >
                        <div class="icons">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-house-icon lucide-house"
                            >
                                <path
                                    d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"
                                />
                                <path
                                    d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"
                                />
                            </svg>
                        </div>
                        <span>beranda</span>
                    </div>
                    <div
                        class="flex flex-col justify-center items-center hover:text-gray-400 cursor-pointer"
                    >
                        <div class="icons">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-clock4-icon lucide-clock-4"
                            >
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                        </div>
                        <span>kehadiran</span>
                    </div>
                    <div
                        class="flex flex-col justify-center items-center hover:text-gray-400 cursor-pointer"
                    >
                        <div class="icons">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-bell-icon lucide-bell"
                            >
                                <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                                <path
                                    d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"
                                />
                            </svg>
                        </div>
                        <span>pemberitahuan</span>
                    </div>
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
