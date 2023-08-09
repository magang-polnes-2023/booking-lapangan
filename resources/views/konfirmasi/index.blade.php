<x-app-layout>
    <a
        class="block max-width p-8 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="border dark:border-gray-700 px-6 py-3 text-center">
                            No
                        </th>
                        <th scope="col" class="border dark:border-gray-700 px-6 py-3 text-center">
                            Nama
                        </th>
                        <th scope="col" class="border dark:border-gray-700 px-6 py-3 text-center">
                            Nama Lapangan
                        </th>
                        <th scope="col" class="border dark:border-gray-700 px-6 py-3 text-center">
                            Tanggal
                        </th>
                        <th scope="col" class="border dark:border-gray-700 px-6 py-3 text-center">
                            Harga
                        </th>
                        <th scope="col" class="border dark:border-gray-700 px-6 py-3 text-center">
                            Status
                        </th>
                        <th scope="col" class="border dark:border-gray-700 px-6 py-3 text-center">
                            Bukti
                        </th>
                        <th scope="col" class="border dark:border-gray-700 px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($booking->count() > 0)
                        @foreach ($booking as $data)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 border dark:border-gray-700 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4 border dark:border-gray-700 ">
                                    {{ $data->user->name }}
                                </td>
                                <td class="px-6 py-4 border dark:border-gray-700 ">
                                    {{ $data->lapangan->nama }}
                                </td>
                                <td class="px-6 py-4 border dark:border-gray-700 ">
                                    {{ $data->tanggal }},{{ $data->start_time }} - {{ $data->end_time }}
                                </td>
                                <td class="px-6 py-4 border dark:border-gray-700 ">
                                    {{ number_format($data->total, 0, ',') }}
                                </td>
                                <td class="px-6 py-4 border dark:border-gray-700 ">
                                    {{ $data->status }}
                                </td>
                                <td class="px-6 py-4 border dark:border-gray-700 ">
                                    <!-- File Upload Form -->
                                    @if ($data->bukti)
                                        <!-- Tampilkan gambar payment jika ada -->
                                        <img src="{{ asset('storage/' . $data->bukti) }}" width="100" height="100"
                                            class="mx-auto">
                                    @else
                                        @if ($data->status == 'Canceled')
                                        @else
                                            <form action="{{ route('order', ['id' => $data->id]) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="flex gap-4">
                                                    <div class="mb-4 flex-1">
                                                        <input type="file" name="bukti" id="bukti"
                                                            class="rounded-xs p-2 w-full" required>
                                                        @error('bukti')
                                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="flex gap-4">
                                                    <div class="rounded-xs p-2 w-full">
                                                        <button type="submit"
                                                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-5 rounded">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                                @if ($errors->any())
                                                    <div class="mt-4 bg-red-200 text-red-700 p-2 rounded">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </form>
                                        @endif
                                    @endif
                                </td>
                                <td class="px-6 py-4 border dark:border-gray-700 ">
                                    @if ($data->status === 'selesai')
                                    @elseif ($data->status === 'Canceled')
                                    @else
                                        <div x-data="{ isOpen: false }" class="relative flex">
                                            <button @click="isOpen = true"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                <p>Detail</p>
                                                <p>
                                                    Pembayaran</p>
                                            </button>

                                            @if ($data->status == 'belum dibayar')
                                                <div class="px-6 py-1 ">
                                                    <form action="{{ route('cancel', ['id' => $data->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <div
                                                            class="mt-4 sm:flex sm:items-center sm:justify-between sm:mt-6 sm:-mx-2">
                                                            <button @click="isOpen = false"
                                                                class="px-4 sm:mx-2 w-full py-2 text text-sm font-medium dark:text-gray-200 dark:border-blue-700 dark:hover:bg-blue-700 tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-700 border border-blue-200 rounded-md hover:bg-blue-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endif

                                            <div x-show="isOpen" x-transition:enter="transition duration-300 ease-out"
                                                x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
                                                x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
                                                x-transition:leave="transition duration-150 ease-in"
                                                x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
                                                x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
                                                class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title"
                                                role="dialog" aria-modal="true">
                                                <div
                                                    class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                        aria-hidden="true">&#8203;</span>

                                                    <div
                                                        class="relative inline-block p-4 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl sm:max-w-xl rounded-xl dark:bg-gray-900 sm:my-8 sm:w-full sm:p-6">

                                                        <div class="mt-5 text-center">
                                                            <h3 class="text-lg font-medium text-gray-800 dark:text-white"
                                                                id="modal-title">
                                                                Order Detail
                                                            </h3>

                                                            <p
                                                                class="mt-2 text-gray-500 dark:text-gray-400 text-justify">
                                                                Harap kirimkan bukti pembayaran dengan transfer ke nomor
                                                                rekening berikut: <span
                                                                    class="font-semibold">[1480020403542
                                                                    a.n Hanna Nur Sadifa].</span>
                                                            </p>
                                                            <p
                                                                class="mt-2 text-gray-500 dark:text-gray-400 text-justify">
                                                                Jika ada pertanyaan, jangan ragu untuk menghubungi
                                                                layanan
                                                                pelanggan kami.
                                                            </p>
                                                        </div>
                                                        <div
                                                            class="mt-4 sm:flex sm:items-center sm:justify-between sm:mt-6 sm:-mx-2">
                                                            <button @click="isOpen = false"
                                                                class="px-4 sm:mx-2 w-full py-2.5 text-sm font-medium dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                                                                Ok
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="6">Tidak Ada Pemesanan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </a>
</x-app-layout>
