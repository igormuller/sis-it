<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista Turmas') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-8 gap-4">
        <div class="col-start-8 mb-3">
            <a href="{{ route('rooms.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                {{ __('Nova Turma') }}
            </a>
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-700">
        <thead class="text-xs uppercase bg-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3">
                    Turno
                </th>
                <th scope="col" class="px-6 py-3">
                    Vagas
                </th>
                <th scope="col" class="px-6 py-3">
                    Ano
                </th>
                <th scope="col" class="px-6 py-3">
                    Série
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr class="bg-white border-b hover:bg-gray-100">
                    <td class="px-6 py-4">
                        {{ $room->id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $room->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $room->shift }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $room->vacancies }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $room->school_year }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $room->serie->name}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex">
                            <a href="{{ route('rooms.edit', $room->id) }}" class="font-medium text-blue-600 hover:underline pr-5">Editar</a>
                            <form method="POST" action="{{ route('rooms.destroy', $room->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="font-medium text-blue-600 hover:underline">Remover</a>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="py-5">
        {{ $rooms->links() }}
    </div>
</x-app-layout>