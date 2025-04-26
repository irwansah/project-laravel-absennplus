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
                class="topbar top-0 bg-white relative md:sticky w-full md:shadow-lg z-[99]"
            >
                <div
                    class="container w-full flex justify-between items-center p-4 md:max-w-[60%] md:mx-auto"
                >
                    <h1>Halo, mona</h1>
                    <div
                        class="profile flex justify-between gap-2 items-center"
                    >
                        <div class="search">
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
                                class="lucide lucide-search-icon lucide-search"
                            >
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <div class="avatar">
                            <img
                                src="https://i.pravatar.cc/50"
                                class="w-10 h-10 rounded-full border-2"
                                alt="Profile"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div
                id="content"
                class="relative container-fluid md:max-w-[60%] md:mx-auto md:border border-[#ddd] min-h-[100dvh] p-4 md:-mt-1"
            >
                <h1 class="text-5xl font-extrabold p-4">
                    Selamat datang Absenn+
                </h1>

                <div
                    class="menu grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 p-4"
                >
                    <div
                        class="col-span-2 md:col-span-3 lg:col-span-4 card card-alert bg-[#aff4c6] shadow-lg w-full rounded-3xl flex justify-start gap-2 p-4"
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
                                class="lucide lucide-info-icon lucide-info"
                            >
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <h1>Sedang Bekerja</h1>
                            <p>6 jam berlalu</p>
                            <button
                                type="button"
                                class="cursor-pointer flex w-full mt-3 justify-center rounded-full bg-gray-100 border-slate-300 border px-3 py-1.5 text-sm/6 font-semibold text-black shadow-xs hover:bg-gray-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                            >
                                Checkout
                            </button>
                        </div>
                    </div>

                    <div
                        class="card card-alert cursor-pointer  hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4"
                    >
                        <div
                            class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2"
                        >
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
                                class="lucide lucide-info-icon lucide-info"
                            >
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">6 baru</span>
                            <h3 class="text-lg font-bold">Cuti</h3>
                        </div>
                    </div>

                    <div
                        class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4"
                    >
                        <div
                            class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2"
                        >
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
                                class="lucide lucide-info-icon lucide-info"
                            >
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">6 baru</span>
                            <h3 class="text-lg font-bold">Slip Gaji</h3>
                        </div>
                    </div>
                    <div
                        class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4"
                    >
                        <div
                            class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2"
                        >
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
                                class="lucide lucide-info-icon lucide-info"
                            >
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">6 baru</span>
                            <h3 class="text-lg font-bold">Lembur</h3>
                        </div>
                    </div>

                    <div
                        class="card card-alert cursor-pointer hover:bg-gray-100 bg-[#e4e4e4] shadow-lg w-full rounded-3xl flex flex-col justify-start gap-2 p-4"
                    >
                        <div
                            class="icons rounded-full bg-red-500 text-white w-10 h-10 p-2"
                        >
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
                                class="lucide lucide-table-of-contents-icon lucide-table-of-contents"
                            >
                                <path d="M16 12H3" />
                                <path d="M16 18H3" />
                                <path d="M16 6H3" />
                                <path d="M21 12h.01" />
                                <path d="M21 18h.01" />
                                <path d="M21 6h.01" />
                            </svg>
                        </div>
                        <div class="body">
                            <span class="text-gray-400">6 baru</span>
                            <h3 class="text-lg font-bold">Riwayat Kehadiran</h3>
                        </div>
                    </div>
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
