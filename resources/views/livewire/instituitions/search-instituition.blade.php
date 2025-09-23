<div>
    <div class="flex flex-row-reverse justify-between items-center">
        <div>
            <a href="{{ route('instituitions.create') }}">
                <x-button-dark 
                    type="button"
                >
                    <x-css-add /> Novo
                </x-button-dark>
            </a>
        </div>
        <h1>Buscar orgão</h1>
    </div>

    <livewire:forms.instituitions.search-instituition-form />

    @if (!$instituitions)
        <p>Nenhum orgão encontrado</p>
    @else
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instituitions as $instituition)
                        <tr
                            onclick="window.location='{{ route('instituitions.edit', ['id' => $instituition['id']]) }}'"
                            class="cursor-pointer"
                        >
                            <td>{{ $instituition['id'] }}</td>
                            <td>{{ $instituition['name'] }}</td>
                            <td>{{ $instituition['created_at'] }}</td>
                            <td>{{ $instituition['updated_at'] }}</td>
                            <td class="flex justify-evenly">
                                <p class="cursor-pointer">
                                    <a href="{{ route('instituitions.edit', ['id' => $instituition['id']]) }}">
                                        <x-css-pen />
                                    </a>
                                </p>
                                <p 
                                    class="cursor-pointer"
                                    wire:click="destroy({{ $instituition['id'] }})"  
                                    wire:confirm="Tem certeza que deseja deletar este orgão?"  
                                ><x-css-trash /></p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
