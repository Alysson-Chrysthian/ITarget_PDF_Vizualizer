<div>
    <div class="flex flex-row-reverse items-center justify-between">
        <div>
            <a href="{{ route('creditors.create') }}">
                <x-button-dark
                    type="button"
                >
                    <x-css-add /> Novo
                </x-button-dark>
            </a>
        </div>
        <h1>Buscar credor</h1>
    </div>

    <livewire:forms.creditors.search-creditor-form />

    @if (!$creditors)
        <p>Nenhum credor encontrado</p>
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
                    @if ($creditors)
                        @foreach ($creditors as $creditor)
                            <tr
                                onclick="window.location='{{ route('creditors.edit', ['id' => $creditor['id']]) }}'"
                                class="cursor-pointer"
                            >
                                <td>{{ $creditor['id'] }}</td>
                                <td>{{ $creditor['name'] }}</td>
                                <td>{{ $creditor['created_at'] }}</td>
                                <td>{{ $creditor['updated_at'] }}</td>
                                <td class="flex justify-evenly">
                                    <p class="cursor-pointer">
                                        <a href="{{ route('creditors.edit', ['id' => $creditor['id']]) }}">
                                            <x-css-pen />
                                        </a>
                                    </p>
                                    <p
                                        class="cursor-pointer"
                                        wire:click="destroy({{ $creditor['id'] }})"
                                        wire:confirm="Tem certeza que deseja deletar esse credor"
                                    ><x-css-trash /></p>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    @endif
</div>
