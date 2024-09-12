<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-2">
        <div>
            <table class="text-sm text-left rtl:text-right text-gray-500">
                <tbody>
                    @foreach($studentForSeries as $data)
                    <tr>
                        <th>Série {{ $data->name }}:</th>
                        <th>{{ $data->total }} Alunos</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <table class="text-sm text-left rtl:text-right text-gray-500">
                <tbody>
                    @foreach($studentForRooms as $data)
                    <tr>
                        <th>Turma {{ $data->name }}:</th>
                        <th>{{ $data->total }} Alunos</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
