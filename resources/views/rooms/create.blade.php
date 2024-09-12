<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Turma') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('rooms.store') }}">
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
            <x-input-label for="shift" :value="__('Turno')" />
            <select id="shift" name="shift" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option></option>
                <option {{ old('shift') == "MORNING" ? "selected" : "" }} value="MORNING">Manhã</option>
                <option {{ old('shift') == "AFTERNOON" ? "selected" : "" }} value="AFTERNOON">Tarde</option>
                <option {{ old('shift') == "FULL_TIME" ? "selected" : "" }} value="FULL_TIME">Integral</option>
            </select>
            <x-input-error :messages="$errors->get('shift')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="vacancies" :value="__('Vagas')" />
            <x-text-input 
                id="vacancies"
                class="block mt-1 w-full"
                type="number"
                name="vacancies"
                :value="old('vacancies')"
                required
                autofocus
                autocomplete="vacancies"
            />
            <x-input-error :messages="$errors->get('vacancies')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="school_year" :value="__('Ano')" />
            <x-text-input 
                id="school_year"
                class="block mt-1 w-full"
                type="text"
                name="school_year"
                :value="old('school_year')"
                required
                autofocus
                autocomplete="school_year"
            />
            <x-input-error :messages="$errors->get('school_year')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="serie_id" :value="__('Série')" />
            <select id="serie_id" name="serie_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected></option>
                @foreach($series as $serie)
                <option {{ old('serie_id') == $serie->id ? "selected" : "" }} value="{{ $serie->id }}">{{ $serie->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('serie_id')" class="mt-2" />
        </div>

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
            Criar
        </button>
    </form>
</x-app-layout>