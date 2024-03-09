<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Semua Izin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                {{-- <div class="px-6 pt-6 pb-6 2xl:w-1/3">
                    @if (request('search'))
                        <h2 class="pb-3 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                            Hasil pencarian : {{ request('search') }}
                        </h2>
                    @endif
                    <form class="flex items-center gap-2">
                        <x-text-input id="search" name="search" type="text" class="w-full"
                            placeholder="Pencarian username ..." value="{{ request('search') }}" autofocus />
                        <x-primary-button type="submit">
                            {{ __('Cari') }}
                        </x-primary-button>
                    </form>
                </div> --}}

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <!-- Add table head for category -->
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Mulai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jam Mulai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Selesai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jam Selesai
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Keperluan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Perizinan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($izins as $izin)
                            @php
                                $user = $users->firstWhere('id', $izin->user_id);
                            @endphp
                            <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $izin->id }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $user->username }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $izin->tanggalmulai }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $izin->jammulai }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $izin->tanggalselesai }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $izin->jamselesai }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $izin->keperluan }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $izin->status }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-3">
                                            <form action="{{ route('semuaizin.approved', $izin) }}" method="Post">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-green-600 dark:text-green-400">
                                                    Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('semuaizin.denied', $izin) }}" method="Post">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-red-600 dark:text-red-400">
                                                    Deny
                                                </button>
                                            </form>
                                    </div>
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <form action="{{ route('semuaizin.destroy', $izin) }}" method="Post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-400">
                                            Hapus
                                        </button>
                                    </form>
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
