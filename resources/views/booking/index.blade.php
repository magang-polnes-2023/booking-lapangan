<x-app-layout>
    <div class="pt-4">
        <section x-data="calc()" x-effect="updateEndTime"
            class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Pemesanan Lapangan</h2>

            <form action="{{ route('card') }}" method="POST" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 mt-3 rounded" role="alert" id="danger-alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <script>
                        setTimeout(function() {
                            var successAlert = document.getElementById('danger-alert');
                            successAlert.style.display = 'none';
                        }, 5000);
                    </script>
                @endif
                @csrf
                @method('POST')
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="nama">Lapangan</label>
                        <input id="lapangan_id" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            value="{{ $lapangan->nama }}" readonly>
                        <input type="hidden" name="lapangan_id" value="{{ $lapangan->id }}">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="name">Nama Pelanggan</label>
                        <input id="user_id" type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            value="{{ auth()->user()->name }}" readonly>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="no_telp">Nomor Telpon</label>
                        <input id="no_telp" type="number" name="no_telp"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            value="{{ old('no_telp') }}">
                    </div>

                    <div>
                        <label class="text-gray-700
                    dark:text-gray-200"
                            for="durasi">Durasi</label>
                        <input id="durasi" type="number" name="durasi"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            value="{{ old('durasi') }}" x-model="bookingDuration" x-on:change="validateEndTime"
                            required>
                    </div>

                    <div>
                        <label class="text-gray-700
                    dark:text-gray-200"
                            for="tanggal">Tanggal</label>
                        <input id="tanggal" type="date" name="tanggal" x-model="bookingDate"
                            x-on:change="validateEndTime"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            value="{{ old('tanggal') }}" min="{{ date('Y-m-d') }}">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="start_time">Jam Mulai</label>
                        <input id="start_time" type="time" name="start_time"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            value="{{ old('start_time') }}" x-model="startTime" x-on:change="validateEndTime">
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="end_time">Jam Selesai</label>
                        <input id="end_time" type="time" name="end_time"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            value="{{ old('end_time') }}" x-bind:min="startTime" x-model="endTime" readonly>
                    </div>

                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="total">Total Harga</label>
                        <input id="total" type="text" name="total"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            value="{{ old('total') }}" x-bind:value="total.toFixed(0)" readonly>
                    </div>

                    <div>
                        <input id="harga" type="hidden" x-model="harga"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
                            value="{{ $lapangan->harga }}" readonly>
                        <input type="hidden" name="harga" value="{{ $lapangan->id }}">
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button
                        class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                </div>
            </form>

            @if (count($bookedTimes) > 0)
                <div class="my-5">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white bg-opacity-80 overflow-hidden shadow-lg sm:rounded-lg p-2 mb-8">
                            <!-- Display bookedTimes using <p> elements -->
                            <div class="text-center">
                                <h1 class="font-semibold text-black">List Booking</h1>
                                @foreach ($bookedTimes as $booked)
                                    <p class="text-gray-500">Tanggal: {{ $booked->tanggal }} dan Jam:
                                        {{ $booked->start_time }} - {{ $booked->end_time }}</p>
                                    </Jam,>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="my-5">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="text-center">
                                <p class="text-gray-500 p-2">Lapangan ini belum dibooking</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </section>

        <script>
            function calc() {
                return {
                    bookedTimes: @json($bookedTimes),
                    bookingDate: '',
                    startTime: '',
                    endTime: '',
                    bookingDuration: 0,
                    harga: {{ $lapangan->harga }},
                    total,

                    validateEndTime() {
                        const overlappingBookings = [];
                        if (this.startTime && this.endTime) {
                            this.bookedTimes.forEach(booking => {
                                const bookingDate = new Date(booking.tanggal);
                                const selectedDate = new Date(this.bookingDate);
                                const isSameDate = bookingDate.toDateString() === selectedDate.toDateString();
                                if (isSameDate) {
                                    const bookedStartTime = new Date(`2000-01-01T${booking.start_time}`);
                                    const bookedEndTime = new Date(`2000-01-01T${booking.end_time}`);
                                    const selectedStartTime = new Date(`2000-01-01T${this.startTime}`);
                                    const selectedEndTime = new Date(`2000-01-01T${this.endTime}`);
                                    const isOverlapping = (selectedStartTime >= bookedStartTime && selectedStartTime <
                                            bookedEndTime) ||
                                        (selectedEndTime > bookedStartTime && selectedEndTime <= bookedEndTime) ||
                                        (selectedStartTime <= bookedStartTime && selectedEndTime >= bookedEndTime);
                                    if (isOverlapping) {
                                        overlappingBookings.push({
                                            date: booking.tanggal,
                                            start: booking.start_time,
                                            end: booking.end_time,
                                        });
                                    }
                                }
                            });
                        }

                        if (overlappingBookings.length > 0) {
                            const alertMessage = overlappingBookings.map(booking => {
                                return `Date: ${booking.date}, Time: ${booking.start} - ${booking.end}`;
                            }).join('\n');

                            alert(
                                `The selected time slot is already booked. Please choose another time.\n\nBooked Dates and Times:\n${alertMessage}`
                            );
                            this.endTime = '';
                        }
                    },

                    updateEndTime() {
                        const startTimeObj = new Date(`2000-01-01 ${this.startTime}`);
                        const endTimeObj = new Date(startTimeObj.getTime() + this.bookingDuration * 60 * 60 * 1000);

                        let endTime =
                            `${endTimeObj.getHours().toString().padStart(2, '0')}:${endTimeObj.getMinutes().toString().padStart(2, '0')}`;
                        this.endTime = endTime;

                        const bookingDuration = parseInt(this.bookingDuration) || 0;
                        const harga = parseFloat(this.harga) || 0;

                        this.total = bookingDuration * harga;
                    }
                }
            };
        </script>
    </div>
</x-app-layout>
