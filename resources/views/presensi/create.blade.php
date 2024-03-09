<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rekam Presensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('presensi.store') }}" class="">
                        @csrf
                        @method('post')
                        <div class="mb-6">
                            <x-input-label for="tanggal" :value="__('Tanggal')" />
                            <x-text-input id="tanggal" name="tanggal" type="date" class="block w-full mt-1" readonly
                                value="{{ date('Y-m-d') }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="jenispresensi" :value="__('Jenis Presensi')" />
                            <x-select id="jenispresensi" name="jenispresensi" type="text" class="block w-full mt-1"
                                required autofocus>
                                <option value="Pagi">Pagi</option>
                                <option value="Sore">Sore</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('jenispresensi')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="jampresensi" :value="__('Jam Presensi')" />
                            <x-text-input id="jampresensi" name="jampresensi" type="text" class="block w-full mt-1" readonly
                                value="{{ date('H:i:s') }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('jampresensi')" />
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script>
                            function updateRealDate() {
                                var now = new Date();
                                var formattedDate = now.toLocaleString();
                    
                                document.getElementById("tanggal").innerHTML = formattedDate;
                            }
                    
                            // Call the function immediately to display the initial date
                            updateRealDate();
                    
                            // Update the date every second (1000 milliseconds)
                            setInterval(updateRealDate, 1000);
                        </script>
                    
                        {{-- <script>
                            var currentDate = new Date(); // Get the current date and time

                            // Check if the current time is before 7 am
                            if (currentDate.getHours() < 7) {
                            currentDate.setDate(currentDate.getDate() - 1); // Subtract one day
                            }

                            // Format the date as "YYYY-MM-DD"
                            var adjustedDate = currentDate.toISOString().split('T')[0];

                            // Set the value of the input element
                            document.getElementById("tanggal").value = adjustedDate;

                        </script> --}}

                        <script>
                            // Update running time every second
                            setInterval(function() {
                                var currentTime = new Date();
                                var hours = currentTime.getHours();
                                var minutes = currentTime.getMinutes();
                                var seconds = currentTime.getSeconds();
                                
                                // Format the time as HH:MM:SS
                                var formattedTime = (hours < 10 ? "0" : "") + hours + ":" + (minutes < 10 ? "0" : "") + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
                        
                                // Update the input field value
                                document.getElementById("jampresensi").value = formattedTime;
                            }, 1000);
                        </script>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __("Simpan") }}</x-primary-button>
                            <a href="{{ route('presensi.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-aray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __("Batal") }}</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
