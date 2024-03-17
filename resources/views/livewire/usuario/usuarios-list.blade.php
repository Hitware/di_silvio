<div>

    <x-a class="p-1" onclick="Livewire.dispatch('openModal', { component: 'usuario.crear-usuario' })">
        Adicionar Usuario
    </x-a>
    <br>
    <div class="flex">
        <x-input type="text" class="block border-gray-200 w-200 mr-2 bg-transparent  text-black " wire:model.live="name" />
        <x-secondary-button class="ml-2" wire:click="cleanFilter">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
        </x-secondary-button>
    </div>

    <div class="mt-4 mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="p-3">Nombre Usuario</th>
                            <th class="p-3">Identificacion</th>
                            <th class="p-3">Telefono</th>
                            <th class="p-3">Correo</th>
                            <th class="p-3">Cargo</th>
                            <th class="p-3">Ciudad</th>
                            <th class="p-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
