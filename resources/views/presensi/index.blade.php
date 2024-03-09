<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Presensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>

                            <x-create-button href="{{ route('presensi.create') }}" />

                            {{-- <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('presensi.create') }}">Rekam Presensi</a> --}}

                        </div>
                        <div>
                            @if (session('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-green-600 dark:text-green-400">{{ session('success') }}</p>
                            @endif
                            @if (session('danger'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-red-600 dark:text-red-400">{{ session('danger') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <!-- Add table head for category -->
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Presensi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jam Presensi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($presensis as $presensi)
                                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $presensi->id }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $presensi->tanggal }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $presensi->jenispresensi }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $presensi->jampresensi }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white dark:bg-gray-800">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        Empty
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- @if ($presensis->hasPages())
                <div class="p-6">
                    {{ $presensis->links() }}
                </div>
                @endif --}}
            </div>
        </div>
    </div>

</x-app-layout>
