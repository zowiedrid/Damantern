<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajukan Izin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('izin.store') }}" class="">
                        @csrf
                        @method('post')
                        <div class="mb-6">
                            <x-input-label for="tanggalmulai" :value="__('Tanggal Mulai')" />
                            <x-text-input id="tanggalmulai" name="tanggalmulai" type="date" class="block w-full mt-1"
                                value="{{ date('Y-m-d') }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggalmulai')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="jammulai" :value="__('Jam Mulai')" />
                            <x-text-input id="jammulai" name="jammulai" type="time" class="block w-full mt-1"
                                required autofocus autocomplete="jammulai" />
                            <x-input-error class="mt-2" :messages="$errors->get('jammulai')" />
                        </div>    

                        <div class="mb-6">
                            <x-input-label for="tanggalselesai" :value="__('Tanggal Selesai')" />
                            <x-text-input id="tanggalselesai" name="tanggalselesai" type="date" class="block w-full mt-1"
                                required autofocus autocomplete="tanggalselesai" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggalselesai')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="jamselesai" :value="__('Jam Selesai')" />
                            <x-text-input id="jamselesai" name="jamselesai" type="time" class="block w-full mt-1"
                                required autofocus autocomplete="jamselesai" />
                            <x-input-error class="mt-2" :messages="$errors->get('jamselesai')" />
                        </div>    

                        <div class="mb-6">
                            <x-input-label for="keperluan" :value="__('Keperluan')" />
                            <x-text-input id="keperluan" name="keperluan" type="text" class="block w-full mt-1"
                                required autofocus autocomplete="keperluan" />
                            <x-input-error class="mt-2" :messages="$errors->get('keperluan')" />
                        </div>



                        <!-- Add category selection input -->

                        {{-- <div class="mb-6">
                            <x-input-label for="category" :value="__('Category')" />
                            <select id="category" name="category_id" class="block w-full mt-1">
                                <option value="">Empty</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div> --}}


                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __("Simpan") }}</x-primary-button>
                            <a href="{{ route('izin.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-aray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __("Batal") }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
