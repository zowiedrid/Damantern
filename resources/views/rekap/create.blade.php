<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rekap Tugas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('rekap.store') }}" class="">
                        @csrf
                        @method('post')
                        <div class="mb-6">
                            <x-input-label for="tanggal" :value="__('Tanggal')" />
                            <x-text-input id="tanggal" name="tanggal" type="text" class="block w-full mt-1" readonly
                                value="{{ date('Y-m-d') }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="judul" :value="__('Judul Tugas')" />
                            <x-text-input id="judul" name="judul" type="text" class="block w-full mt-1"
                                required autofocus autocomplete="judul" />
                            <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="rekap" :value="__('Rekap')" />
                            <x-text-input id="rekap" name="rekap" type="text" class="block w-full mt-1"
                                required autofocus autocomplete="rekap" />
                            <x-input-error class="mt-2" :messages="$errors->get('rekap')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __("Simpan") }}</x-primary-button>
                            <a href="{{ route('rekap.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-aray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __("Batal") }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
