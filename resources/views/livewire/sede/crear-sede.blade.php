<div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <x-card>

            @slot('title')
                Agregar Sede
            @endslot

            @slot('html')

                <form wire:submit.prevent="submit" method="post">

                    <div class="mt-10 grid grid-cols-1 gap-x-10 gap-y-8 sm:grid-cols-10">
                        
                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Nombre Sede</x-label>
                            <x-input type="text" wire:model="nombre_sede" placeholder="Nombre Sede" />
                            @error('nombre_sede')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Persona Encargada</x-label>
                            <x-input type="text" wire:model="nombre_encargado" placeholder="Nombre Encargado" />
                            @error('nombre_encargado')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Direccion Sede</x-label>
                            <x-input type="text" wire:model="direccion_sede" placeholder="Direccion Sede" />
                            @error('direccion_sede')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label>Telefono</x-label>
                            <x-input type="text" wire:model="telefono_sede" placeholder="Correo" />
                            @error('telefono_sede')
                                {{ $message }}
                            @enderror
                        </div>

                    </div>

                    <br>
                    <x-button type="submit">
                        Guardar Sede
                    </x-button>
                </form>

            @endslot
        </x-card>
    </div>

</div>
