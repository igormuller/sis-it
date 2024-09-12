<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Estudante') }}
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
                :value="old('name', $student->name)"
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
                :value="old('birthday', $student->birthday)"
                required
                autocomplete="birthday"
            />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
        </div>

        <div class="mb-5">
            <x-input-label for="mothers_name" :value="__('Nome da Mae')" />
            <x-text-input 
                id="mothers_name"
                class="block mt-1 w-full"
                type="text"
                name="mothers_name"
                :value="old('mothers_name', $student->mothers_name)"
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
                :value="old('fathers_name', $student->fathers_name)"
                required
                autocomplete="fathers_name"
            />
            <x-input-error :messages="$errors->get('fathers_name')" class="mt-2" />
        </div>


        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
            Criar
        </button>
    </form>
    <div class="pt-5">
        <div class="flex">
            <div class="flex-auto">
                <h4 class="text-2xl font-bold mt-5">Endereços</h4>
            </div>
            <div class="flex-none pt-6">
                <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    Novo
                </a>
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-700 mt-2">
            <thead class="text-xs uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tipo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Endereço
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Número/Complemento
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student->addresses as $address)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="px-6 py-4">
                            {{ $address->type }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $address->street }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $address->number }} - {{ $address->complement }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>