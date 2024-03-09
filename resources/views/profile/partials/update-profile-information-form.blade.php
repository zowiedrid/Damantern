<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

        <div class="mt-6">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required autofocus autocomplete="username" readonly />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>



    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- @if(auth()->user()->is_admin)
            @include('profile.partials.update-profile-information-form')
        @endif --}}


        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="tanggallahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tanggallahir" name="tanggallahir" type="date" class="mt-1 block w-full" :value="old('tanggallahir', $user->tanggallahir)" required autofocus autocomplete="tanggallahir" />
            <x-input-error class="mt-2" :messages="$errors->get('tanggallahir')" />
        </div>

        <div>
            <x-input-label for="jeniskelamin" :value="__('Jenis Kelamin (Laki-laki/Perempuan)')" />
            <x-text-input id="jeniskelamin" name="jeniskelamin" type="text" class="mt-1 block w-full" :value="old('jeniskelamin', $user->jeniskelamin)" required autofocus autocomplete="jeniskelamin" />
            <x-input-error class="mt-2" :messages="$errors->get('jeniskelamin')" />
        </div>

        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat', $user->alamat)" required autofocus autocomplete="alamat" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <div>
            <x-input-label for="nohp" :value="__('No. HP')" />
            <x-text-input id="nohp" name="nohp" type="text" class="mt-1 block w-full" :value="old('nohp', $user->nohp)" required autofocus autocomplete="nohp" />
            <x-input-error class="mt-2" :messages="$errors->get('nohp')" />
        </div>

        <div>
            <x-input-label for="asalinstansi" :value="__('Asal Instansi')" />
            <x-text-input id="asalinstansi" name="asalinstansi" type="text" class="mt-1 block w-full" :value="old('asalinstansi', $user->asalinstansi)" required autofocus autocomplete="asalinstansi" />
            <x-input-error class="mt-2" :messages="$errors->get('asalinstansi')" />
        </div>

        <div>
            <x-input-label for="jurusan" :value="__('Jurusan')" />
            <x-text-input id="jurusan" name="jurusan" type="text" class="mt-1 block w-full" :value="old('jurusan', $user->jurusan)" required autofocus autocomplete="jurusan" />
            <x-input-error class="mt-2" :messages="$errors->get('jurusan')" />
        </div>

        <div>
            <x-input-label for="semesterkelas" :value="__('Semester/Kelas')" />
            <x-text-input id="semesterkelas" name="semesterkelas" type="text" class="mt-1 block w-full" :value="old('semesterkelas', $user->semesterkelas)" required autofocus autocomplete="semesterkelas" />
            <x-input-error class="mt-2" :messages="$errors->get('semesterkelas')" />
        </div>

        <div>
            <x-input-label for="mulaimagang" :value="__('Mulai Magang')" />
            <x-text-input id="mulaimagang" name="mulaimagang" type="date" class="mt-1 block w-full" :value="old('mulaimagang', $user->mulaimagang)" required autofocus autocomplete="mulaimagang" />
            <x-input-error class="mt-2" :messages="$errors->get('mulaimagang')" />
        </div>

        <div>
            <x-input-label for="selesaimagang" :value="__('Mulai Magang')" />
            <x-text-input id="selesaimagang" name="selesaimagang" type="date" class="mt-1 block w-full" :value="old('selesaimagang', $user->selesaimagang)" required autofocus autocomplete="selesaimagang" />
            <x-input-error class="mt-2" :messages="$errors->get('selesaimagang')" />
        </div>

        

        
        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div> --}}

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
