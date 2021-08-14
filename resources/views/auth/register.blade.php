@section('title', 'Register')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <?php 
         $data = DB::table('instansi')->select('*')->get() 
        ?>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Select option-->
          <!--  <div class="mt-4">
                <x-label for="badan" value="{{ __('Instansi:')}}"></x-label>
                <select name="badan" id="badan" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value=" " selected disabled>-- Pilih Satu --</option>
                    <option id="sekretariatdaerah" value="01">Sekretariat Daerah</option>
                    <option id="sekretariatdprd" value="02">Sekretariat DPRD</option>
                    <option id="badan" value="03">Badan</option>
                    <option id="dinas" value="04">Dinas</option>
                </select>
            </div> -->

            <!-- Select option-->
            <div class="mt-4">
                <x-label for="instansiID" value="{{ __('Nama OPD:')}}"></x-label>
                <select name="instansiID" id="instansi" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                   @foreach ($data as $datas)
                   <option value="{{$datas->id}}">{{$datas->instansi_name}}</option>
                   @endforeach
                    
                </select>
            </div>

            <!-- Select option-->
            <div class="mt-4">
                <x-label for="registered_as" value="{{ __('Mendaftar Sebagai:')}}"></x-label>
                <select name="registered_as" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value=" " selected disabled>-- Pilih Satu --</option>
                    <option id="admin" value="admin">Admin</option>
                    <option id="user" value="user">User</option>
                </select>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
