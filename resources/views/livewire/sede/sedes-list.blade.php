<div>

    <x-a class="p-1" onclick="Livewire.dispatch('openModal', { component: 'sede.crear-sede' })">
        Adicionar Sede
    </x-a>
    <br>
    <div class="flex">
        <x-input type="text" class="block border-gray-200 w-200 mr-2 bg-transparent  text-black " wire:model.live="sede" />
        <x-secondary-button class="ml-2" wire:click="cleanFilter">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M2.515 10.674a1.875 1.875 0 0 0 0 2.652L8.89 19.7c.352.351.829.549 1.326.549H19.5a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-9.284c-.497 0-.974.198-1.326.55l-6.375 6.374ZM12.53 9.22a.75.75 0 1 0-1.06 1.06L13.19 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06l1.72-1.72 1.72 1.72a.75.75 0 1 0 1.06-1.06L15.31 12l1.72-1.72a.75.75 0 1 0-1.06-1.06l-1.72 1.72-1.72-1.72Z" clip-rule="evenodd" />
              </svg>
              
              
        </x-secondary-button>
    </div>

    <div class="mt-4 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="p-3">Nombre Sede</th>
                            <th class="p-3">Direccion Sede</th>
                            <th class="p-3">Telefono Sede</th>
                            <th class="p-3">Nombre Encargado</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($sedes as $sede)
                        <tr
                            class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">{{ $sede->nombre_sede }}</td>
                            <td class="px-4 py-3">{{ $sede->direccion_sede }}</td>
                            <td class="px-4 py-3">{{ $sede->telefono_sede }}</td>
                            <td class="px-4 py-3">{{ $sede->nombre_encargado }}</td>
                        </tr>
                        @empty
                        <p>Sin registros</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
