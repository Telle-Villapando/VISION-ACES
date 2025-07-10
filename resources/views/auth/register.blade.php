<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- First Name --}}
        <div>
            <x-input-label for="firstName" :value="__('First Name')" />
            <x-text-input id="firstName" class="block w-full mt-1" type="text" name="firstName" :value="old('firstName')" required autofocus />
            <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
        </div>

        {{-- Middle Name --}}
        <div class="mt-4">
            <x-input-label for="middleName" :value="__('Middle Name')" />
            <x-text-input id="middleName" class="block w-full mt-1" type="text" name="middleName" :value="old('middleName')" />
            <x-input-error :messages="$errors->get('middleName')" class="mt-2" />
        </div>

        {{-- Last Name --}}
        <div class="mt-4">
            <x-input-label for="lastName" :value="__('Last Name')" />
            <x-text-input id="lastName" class="block w-full mt-1" type="text" name="lastName" :value="old('lastName')" required />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>

        {{-- Student Number --}}
        <div class="mt-4">
            <x-input-label for="studentNumber" :value="__('Student Number')" />
            <x-text-input id="studentNumber" class="block w-full mt-1" type="text" name="studentNumber" :value="old('studentNumber')" required />
            <x-input-error :messages="$errors->get('studentNumber')" class="mt-2" />
        </div>

        {{-- Course --}}
        <div class="mt-4">
            <select id="course" name="course" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Select Course --</option>
                <option value="BSCPE" {{ old('course') == 'BSCPE' ? 'selected' : '' }}>BSCPE</option>
                <option value="DCPET" {{ old('course') == 'DCPET' ? 'selected' : '' }}>DCPET</option>
            </select>
        </div>

        {{-- Year Level --}}
        <div class="mt-4">
            <select id="yearLevel" name="yearLevel" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Select Year Level --</option>
                <option value="1st" {{ old('yearLevel') == '1st' ? 'selected' : '' }}>1st Year</option>
                <option value="2nd" {{ old('yearLevel') == '2nd' ? 'selected' : '' }}>2nd Year</option>
                <option value="3rd" {{ old('yearLevel') == '3rd' ? 'selected' : '' }}>3rd Year</option>
                <option value="4th" {{ old('yearLevel') == '4th' ? 'selected' : '' }}>4th Year</option>
            </select>
        </div>

        {{-- Address --}}
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block w-full mt-1" type="text" name="address" :value="old('address')" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        {{-- Contact Number --}}
        <div class="mt-4">
            <x-input-label for="contactNumber" :value="__('Contact Number')" />
            <x-text-input id="contactNumber" class="block w-full mt-1" type="text" name="contactNumber" :value="old('contactNumber')" required />
            <x-input-error :messages="$errors->get('contactNumber')" class="mt-2" />
        </div>

        {{-- Birthdate --}}
        <div class="mt-4">
            <x-input-label for="birthDate" :value="__('Birthdate')" />
            <x-text-input id="birthDate" class="block w-full mt-1" type="date" name="birthDate" :value="old('birthDate')" required />
            <x-input-error :messages="$errors->get('birthDate')" class="mt-2" />
        </div>

        {{-- Age --}}
        <div class="mt-4">
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" class="block w-full mt-1" type="number" name="age" :value="old('age')" required />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        {{-- Gender --}}
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="LGBTQ+" {{ old('gender') == 'LGBTQ+' ? 'selected' : '' }}>Other</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        {{-- Student Status --}}
        <div class="mt-4">
            <x-input-label for="studentStatus" :value="__('Student Status')" />
            <select id="studentStatus" name="studentStatus" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Select Status</option>
                <option value="Regular" {{ old('studentStatus') == 'Regular' ? 'selected' : '' }}>Regular</option>
                <option value="Irregular" {{ old('studentStatus') == 'Irregular' ? 'selected' : '' }}>Irregular</option>
                <option value="Alumni" {{ old('studentStatus') == 'Alumni' ? 'selected' : '' }}>Alumni</option>
            </select>
            <x-input-error :messages="$errors->get('studentStatus')" class="mt-2" />
        </div>

        {{-- Email --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Confirm Password --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Already Registered & Submit --}}
        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
