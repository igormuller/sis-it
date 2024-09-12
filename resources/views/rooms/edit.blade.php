<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Turma') }}
        </h2>
    </x-slot>
    <div class="pb-8">
        <form method="POST" action="{{ route('rooms.update', $room->id) }}">
            @method('PUT')
            @csrf

            <div class="mb-5">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input 
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name', $room->name)"
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
                    <option {{ old('shift', $room->shift) == "MORNING" ? "selected" : "" }} value="MORNING">Manhã</option>
                    <option {{ old('shift', $room->shift) == "AFTERNOON" ? "selected" : "" }} value="AFTERNOON">Tarde</option>
                    <option {{ old('shift', $room->shift) == "FULL_TIME" ? "selected" : "" }} value="FULL_TIME">Integral</option>
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
                    :value="old('vacancies', $room->vacancies)"
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
                    :value="old('school_year', $room->school_year)"
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
                    <option {{ old('serie_id', $room->serie_id) == $serie->id ? "selected" : "" }} value="{{ $serie->id }}">{{ $serie->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('serie_id')" class="mt-2" />
            </div>

            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                Editar
            </button>
        </form>
    </div>
    <hr></hr>

    <div class="pt-5">
        <div class="flex flex-row-reverse">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="flex">
            <div class="flex-auto">
                <h4 class="text-2xl font-bold mt-5">Lista de Alunos</h4>
            </div>
            @can('secretary')
            <form method="POST" action="{{ route('rooms.enroll', $room->id) }}">
                @csrf
                <div class="flex pt-6">
                    <select id="student_id" name="student_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-8 mr-4">
                        <option selected></option>
                        @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->enroll }} - {{ $student->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Matricular
                    </button>
                </div>
            </form>
            @endcan
        </div>
        <table class="w-full text-sm text-left text-gray-700 mt-2">
            <thead class="text-xs uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Matrícula
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mãe
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pai
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($room->students as $student)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="px-6 py-4">
                            {{ $student->enroll }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $student->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $student->mothers_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $student->fathers_name }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>