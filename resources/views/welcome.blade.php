<x-app-layout>
    <header class="bg-white dark:bg-gray-900 h-full">
        <div class="container py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="items-center lg:flex">
                <div class="w-full lg:w-1/2">
                    <div class="lg:max-w-lg">
                        <h1 class="text-3xl font-serif font-semibold text-gray-800 dark:text-white lg:text-4xl">Best
                            place to
                            choose
                            <br> The <span class="text-blue-500 ">Field</span>
                        </h1>

                        <p class="text-justify mt-3 text-gray-600 dark:text-gray-400">Selamat datang di The Field, tempat
                            favorit Anda untuk memesan lapangan. Kami memberikan solusi terbaik
                            untuk penggemar olahraga, klub, dan individu yang mencari dan memesan bidang yang sesuai
                            dengan kebutuhan mereka.
                        </p>
                        <a href="{{ Route('lapangan') }}">
                            <button
                                class="w-full px-5 py-2 mt-6 text-sm tracking-wider text-white uppercase transition-colors duration-300 transform bg-blue-600 rounded-lg lg:w-auto hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Pesan
                                Sekarang</button>
                        </a>
                    </div>
                </div>

                <div class="grid py-6 grid-cols-2 md:grid-cols-2 gap-4">
                    <div class="grid gap-4">
                        <div class="">
                            <img class="h-[22rem] w-72 rounded" src="{{ asset('gambar/bola.jpg') }}">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-[18rem] w-72 rounded" src="{{ asset('gambar/voli.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b-4 border-gray-400 lg:w-1/4"></span>

                <p class="text-2xl pb-6 text-center text-gray-950 uppercase dark:text-gray-400">About</p>

                <span class="w-1/5 border-b-4 border-gray-400 lg:w-1/4"></span>
            </div>

            <p class="max-w-6xl mx-auto mt-4 text-gray-700">
                Selamat datang di platform kami! Kami adalah tempat terbaik untuk pembokingan lapangan olahraga yang
                mudah dan praktis, menyediakan solusi terbaik bagi para penggemar olahraga, klub, dan individu yang
                ingin mencari dan memesan lapangan sesuai kebutuhan mereka. Apakah Anda mencari lapangan futsal, basket,
                atau voli, semua tersedia di sini.Nikmati harga yang terjangkau. Jadwalkan lapangan Anda sekarang juga
                dan tingkatkan pengalaman berolahraga Anda ke level yang lebih tinggi. Terima kasih atas kepercayaan
                Anda menggunakan layanan kami.
            </p>
        </div>

        <div class="text-center py-3 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center py-10 justify-between mt-4">
                <span class="w-1/5 border-b-4 border-gray-400 lg:w-1/4"></span>

                <p class="text-2xl text-center text-gray-950 uppercase dark:text-gray-400">Galeri Lapangan</p>

                <span class="w-1/5 border-b-4 border-gray-400 lg:w-1/4"></span>
            </div>



            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('gambar/galeri1.jpg') }}"
                            alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('gambar/galeri2.jpg') }}"
                            alt="">
                    </div>

                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-[30rem] w-full rounded-lg" src="{{ asset('gambar/galeri10.jpg') }}"
                            alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('gambar/galeri9.jpg') }}"
                            alt="">
                    </div>
                    <div>
                        <img class="h-full max-w-full rounded-lg" src="{{ asset('gambar/galeri7.jpg') }}"
                            alt="">
                    </div>

                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('gambar/galeri4.jpg') }}"
                            alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('gambar/galeri8.jpg') }}"
                            alt="">
                    </div>
                    <div>
                        <img class="h-full max-w-full rounded-lg" src="{{ asset('gambar/galeri6.jpg') }}"
                            alt="">
                    </div>

                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('gambar/galeri5.jpg') }}"
                            alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('gambar/galeri3.jpg') }}"
                            alt="">
                    </div>

                </div>
            </div>

        </div>
        <footer class="bg-white px-5 py-6 dark:bg-gray-900">
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="/"
                        class="hover:underline">The Field™</a>. All Rights Reserved.
                </span>
            </div>
        </footer>
    </header>

</x-app-layout>
