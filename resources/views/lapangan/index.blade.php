<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="container pt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-screen">
            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b-4 border-gray-400 lg:w-1/4"></span>

                <p class="text-2xl py-5 text-center text-gray-950 uppercase dark:text-gray-400">Lapangan</p>

                <span class="w-1/5 border-b-4 border-gray-400 lg:w-1/4"></span>
            </div>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($lapangan as $lap)
                    <div class="flex flex-col items-center justify-center w-full max-w-sm mx-auto">
                        <div class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md"
                            style="background-image: url('{{ asset('storage/' . $lap->gambar) }}')">
                        </div>

                        <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                            <h3
                                class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase dark:text-white">
                                {{ $lap->nama }}</h3>

                            <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                                <span
                                    class="font-bold text-gray-800 dark:text-gray-200">{{ number_format($lap->harga, 0, ',') }}
                                    /jam</span>

                                @if (Auth::check())
                                    <a href="{{ route('booking', ['id' => $lap->id]) }}"><button
                                            class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">Booking
                                            Disini</button>
                                    </a>
                                @else
                                    <a onclick="checkIfLoggedIn()"><button
                                            class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">Booking
                                            Disini</button>
                                    </a>
                                    <script>
                                        function checkIfLoggedIn() {
                                            var userLoggedIn = false;

                                            if (userLoggedIn) {
                                                window.location.href = "/register";
                                            } else {
                                                var confirmation = confirm("Anda Harus Login Terlebih Dahulu");

                                                if (confirmation) {
                                                    window.location.href = "/register";
                                                } else {}
                                            }
                                        }
                                    </script>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
</x-app-layout>
