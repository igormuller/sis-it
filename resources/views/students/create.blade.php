<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Estudante') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('students.store') }}">
        @csrf

        <div class="mb-5">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input 
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="birthday" :value="__('Data de Nascimento')" />
            <x-text-input 
                id="birthday"
                class="block mt-1 w-full"
                type="text"
                name="birthday"
                :value="old('birthday')"
                required
                autocomplete="birthday"
            />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="mothers_name" :value="__('Nome da Mãe')" />
            <x-text-input 
                id="mothers_name"
                class="block mt-1 w-full"
                type="text"
                name="mothers_name"
                :value="old('mothers_name')"
                required
                autocomplete="mothers_name"
            />
            <x-input-error :messages="$errors->get('mothers_name')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="fathers_name" :value="__('Nome do Pai')" />
            <x-text-input 
                id="fathers_name"
                class="block mt-1 w-full"
                type="text"
                name="fathers_name"
                :value="old('fathers_name')"
                required
                autocomplete="fathers_name"
            />
            <x-input-error :messages="$errors->get('fathers_name')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="address_type" :value="__('Tipo de Endereço')" />
            <select id="address_type" name="address_type" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option></option>
                <option {{ old('address_type') == "BILLING" ? "selected" : "" }} value="BILLING">Cobrança</option>
                <option {{ old('address_type') == "HOME" ? "selected" : "" }} value="HOME">Residencial</option>
                <option {{ old('address_type') == "MAILING" ? "selected" : "" }} value="MAILING">Correspondência</option>
            </select>
            <x-input-error :messages="$errors->get('address_type')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="address_zipcode" :value="__('CEP')" />
            <x-text-input 
                id="address_zipcode"
                class="block mt-1 w-full"
                type="text"
                name="address_zipcode"
                :value="old('address_zipcode')"
                required
                autocomplete="address_zipcode"
            />
            <x-input-error :messages="$errors->get('address_zipcode')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="address_street" :value="__('Endereço')" />
            <x-text-input 
                id="address_street"
                class="block mt-1 w-full"
                type="text"
                name="address_street"
                :value="old('address_street')"
                required
                autocomplete="address_street"
            />
            <x-input-error :messages="$errors->get('address_street')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="address_number" :value="__('Número')" />
            <x-text-input 
                id="address_number"
                class="block mt-1 w-full"
                type="text"
                name="address_number"
                :value="old('address_number')"
                autocomplete="address_number"
            />
            <x-input-error :messages="$errors->get('address_number')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="address_complement" :value="__('Complemento')" />
            <x-text-input 
                id="address_complement"
                class="block mt-1 w-full"
                type="text"
                name="address_complement"
                :value="old('address_complement')"
                autocomplete="address_complement"
            />
            <x-input-error :messages="$errors->get('address_complement')" class="mt-2" />
        </div>

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
            Criar
        </button>
    </form>
</x-app-layout>