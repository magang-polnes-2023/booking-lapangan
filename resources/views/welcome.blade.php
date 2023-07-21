@extends('template.layouts')

@section('konten')
    <header class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="items-center lg:flex">
                <div class="w-full lg:w-1/2">
                    <div class="lg:max-w-lg">
                        <h1 class="text-3xl font-semibold text-gray-800 dark:text-white lg:text-4xl">Best place to choose
                            <br> your <span class="text-blue-500 ">clothes</span>
                        </h1>

                        <p class="mt-3 text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Porro beatae error laborum ab amet sunt recusandae? Reiciendis natus perspiciatis optio.
                        </p>

                        <button
                            class="w-full px-5 py-2 mt-6 text-sm tracking-wider text-white uppercase transition-colors duration-300 transform bg-blue-600 rounded-lg lg:w-auto hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Shop
                            Now</button>
                    </div>
                </div>

                <div class="flex items-center justify-center w-full mt-6 lg:mt-0 lg:w-1/2">
                    <img class="w-full h-full lg:max-w-3xl" src="{{ asset('gambar/icon-hero.png') }}"
                        alt="Catalogue-pana.svg">
                </div>
            </div>
        </div>
    </header>


    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="text-center">
                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">From the blog</h1>

                <p class="max-w-lg mx-auto mt-4 text-gray-500">
                    Salami mustard spice tea fridge authentic Chinese food dish salt tasty liquor. Sweet savory foodtruck
                    pie.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2 xl:grid-cols-3">
                <div>
                    <div class="relative overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80"
                            src="{{ asset('gambar/lapangan-voli.jpg') }}" alt="Lapangan voli">
                        <div class="p-6">
                            <h1 class="text-xl font-bold text-gray-800 dark:text-white">Lapangan Voli</h1>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Modi quos quidem sequi illum facere recusandae voluptatibus</p>
                        </div>
                        <div class="flex items-center justify-center px-6 py-3 bg-gray-900">
                            <button
                                class="px-4 py-2 text-xs font-semibold text-white uppercase bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-700">Pesan</button>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="relative overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80"
                            src="{{ asset('gambar/lapangan-basket.jpg') }}" alt="Lapangan basket">
                        <div class="p-6">
                            <h1 class="text-xl font-bold text-gray-800 dark:text-white">Lapangan Basket</h1>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Modi quos quidem sequi illum facere recusandae voluptatibus</p>
                        </div>
                        <div class="flex items-center justify-center px-6 py-3 bg-gray-900">
                            <button
                                class="px-4 py-2 text-xs font-semibold text-white uppercase bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-700">Pesan</button>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="relative overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80"
                            src="{{ asset('gambar/1.jpg') }}" alt="Lapangan futsal">
                        <div class="p-6">
                            <h1 class="text-xl font-bold text-gray-800 dark:text-white">Lapangan Futsal</h1>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Modi quos quidem sequi illum facere recusandae voluptatibus</p>
                        </div>
                        <div class="flex items-center justify-center px-6 py-3 bg-gray-900">
                            <button
                                class="px-4 py-2 text-xs font-semibold text-white uppercase bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-700">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
