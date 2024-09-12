<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Estudantes') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-7 gap-4">
        <div class="col-start-7 mb-3">
            <a href="{{ route('students.create') }}" class="'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150' ms-4 bg-gray-200">
                {{ __('Novo') }}
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
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="bg-white border-b hover:bg-gray-100">
                    <td class="px-6 py-4">
                        {{ $student->id }}
                    </td>
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
                    <td class="px-6 py-4">
                        <a href="{{ route('students.edit', $student->id) }}" class="font-medium text-blue-600 hover:underline pr-5">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="py-5">
        {{ $students->links() }}
    </div>
</x-app-layout>